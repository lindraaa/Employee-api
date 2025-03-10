<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    function get_department(){
        $alldeparment = Department::all();
        if (!$alldeparment->isEmpty()) {
            return response()->json($alldeparment, 200);
        } else {
            return response()->json(["message" => "No available Departments"], 200);
        }
    }
    function find_department(Request $req){
        $department = Department::find($req->id);
        if (!$department) {
            return response()->json(["message" => "Department not found"], 404);
        }
        return response()->json($department);

    }
    function create_department(StoreDepartmentRequest $req)
    {
        //for data validation
        $validated = $req->validated();
        $department = Department::create($validated);
        return response()->json(["message" => "Department created successfully", 
                                "Added Data:"=>$department], 200);
    }
    function update_department(StoreDepartmentRequest $req)
    {
        $department = Department::find($req->id);

        if (!$department) {
            return response()->json(["message" => "Department not found"], 404);
        }{
            //for data validation
            $validated = $req->validated();
            $department->update($validated);
            return response()->json(["message" => "Department Updated Successfully",
                                    "Updated Data:"=>$department], 200);
        }
    }
    
    function delete_department(Request $req)
    {
        $department = Department::find($req->id);

        if (!$department) {
            return response()->json(["message" => "Not existing or deleted already"], 404);
        } else {
            $department->delete();
            return response()->json(["message" => "Deleted successfully"], 200);
        }
    }

}
