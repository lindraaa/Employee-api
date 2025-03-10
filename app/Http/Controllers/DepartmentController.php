<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Resources\Department\DepartmentCollection;
use App\Http\Resources\Department\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    function get_department(){
        $alldeparment = Department::all();
        if (!$alldeparment->isEmpty()) {
            return $this->customResponse('List of Deparmtents',new DepartmentCollection($alldeparment));
        } else {
            return $this->customResponse("No available Departments",[],204);
        }
    }
    function find_department(Request $req){
        $department = Department::find($req->id);
        if (!$department) {
            return $this->customResponse('Department not found',[],404,false);
        }
        return $this->customResponse('Department Found',new DepartmentResource($department));

    }
    function create_department(StoreDepartmentRequest $req)
    {
        //for data validation
        $validated = $req->validated();
        $department = Department::create($validated);
        return $this->customResponse('Department created successfully',new DepartmentResource($department),200);
    
    }
    function update_department(StoreDepartmentRequest $req)
    {
        $department = Department::find($req->id);

        if (!$department) {
            return $this->customResponse('Department not found',[],404,false);
        }{
            //for data validation
            $validated = $req->validated();
            $department->update($validated);
            return $this->customResponse('Department Updated Successfully',new DepartmentResource($department));

        }
    }
    
    function delete_department(Request $req)
    {
        $department = Department::find($req->id);

        if (!$department) {
            return $this->customResponse('Not existing or deleted already',[],404,false);
        } else {
            $department->delete();
            return $this->customResponse("Deleted successfully",[]);
        }
    }

}
