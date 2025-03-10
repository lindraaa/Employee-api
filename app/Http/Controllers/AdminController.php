<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminonly(Request $req){
        // $fields = $req->validate([
        //     "name"=>"required|string",
        //     "email"=>"required|string|unique:users,email",
        //     'password'=>"required|string"
        // ]);
        // $user = User::create([
        //     "name" => $fields['name'],
        //     "email"=> $fields['email'],
        //     "password"=> bcrypt ($fields['password'])
        // ]);
        
        //Default 
        $name = env("ADMIN_NAME");
        $email = env("ADMIN_EMAIL");
        $password = env("ADMIN_PASSWORD");
        if (!$name || !$email || !$password) {
            return response()->json([
                'error' => 'Admin credentials are not set in the .env file.'
            ], 400); // Return an error if any required env variables are missing
        }
        $user = User::create([
            "name" => $name,
            "email"=> $email,
            "password"=> bcrypt ($password)
        ]);

        $token = $user->createToken("admintoken")->plainTextToken;

        $response = [
            "user"=>$user,
            "token"=>$token
        ];
        return response()->json($response);
    }

    public function login(Request $req){
        $fields = $req->validate([
            "email"=>"required|string|",
            'password'=>"required|string"
        ]);
        $user = User::where("email",$fields["email"])->first();

        if(!$user ||!hash::check($fields["password"],$user->password)){
            return response()->json(["message"=>"Invalid Credentials"],401);
        }
        $token = $user->createToken("admintoken")->plainTextToken;

        $response = [
            "user"=>$user,
            "token"=>$token
        ];
        return response()->json($response);
    }
    public function logout(Request $req){
        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });
                return response()->json(["message"=>"Logout Successfully"]);
    }
}
// 9|wlXJ7XLLTkIZpoFTNOsl3HLhg8CVBcmI1xSBt3ZP