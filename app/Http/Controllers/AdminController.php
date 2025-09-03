<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function adminonly(Request $req){
        try{        
            $fields = $req->validate([
                "name"=>"required|string",
                "email"=>"required|string|email|unique:users,email",
                'password'=>"required|string"
            ]);
            $user = User::create([
                "name" => $fields['name'],
                "email"=> $fields['email'],
                "password"=> bcrypt ($fields['password'])
            ]);

            $token = $user->createToken("admintoken")->plainTextToken;

            $response = [
                "user"=>$user,
                "token"=>$token
            ];
            return $this->customResponse('Registered Successfully',$response,);
        }catch(ValidationException $error){
            return $this->customResponse('Validation Error',$error->errors(),422,false);
        }
    }

    public function login(Request $req){
        try {
            $fields = $req->validate([
            "email"    => "required|string",
            "password" => "required|string"
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
                return $this->customResponse('Validation failed', $e->errors(), 422, false);
        }
        $user = User::where("email",$fields["email"])->first();

        if(!$user ||!Hash::check($fields["password"],$user->password)){
            return $this->customResponse('Invalid Credentials',[],401,false);
        }
        $token = $user->createToken("admintoken")->plainTextToken;

        $response = [
            "user"=>$user,
            "token"=>$token
        ];
        return $this->customResponse('login Successfully',$response);
    }
    public function logout(Request $req){
        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });
        return $this->customResponse('logout Successfully');
    }
}
// 9|wlXJ7XLLTkIZpoFTNOsl3HLhg8CVBcmI1xSBt3ZP