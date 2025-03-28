<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Resources\Employee\EmployeeCollection;
use App\Http\Resources\Employee\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EmployeeController extends Controller
{
    // 
    public function get_employee()
    {
        $allEmployee = Employee::all();
        if (!$allEmployee->isEmpty()) {
            return $this->customResponse('list of Employees',new EmployeeCollection($allEmployee));
        } else {
            return $this->customResponse('No available Employees',[],404);
        }
    }

    public function find_employee(Request $req)
    {
        $employee = Employee::find($req->id);
        if (!$employee) {
            return $this->customResponse("Employee not found",[],404);
        }
        return $this->customResponse("Employee Found",new EmployeeResource($employee));
    }

    public function create_employee(StoreEmployeeRequest $req)
    {
        //for data validation
        $validated = $req->validated();
        $employee = Employee::create($validated);
        return  $this->customResponse("Employee created successfully",new EmployeeResource($employee));
    }

    public function update_employee(Request $req)
    {   
        $employee = Employee::find($req->id);
    
        if (!$employee) {
            return $this->customResponse("Employee not found", [], 404);
        }
        try{
        $validated = $req->validate($this->updateRules($req->id));
        }catch(ValidationException $error){
            return $this->customResponse('Validation Error',$error->errors(),422,false);
        }
        $employee->update($validated);
        return $this->customResponse('Employee Updated Successfully', new EmployeeResource($employee));
    }
    
    public function delete_employee(Request $req)
    {
        $employee = Employee::find($req->id);

        if (!$employee) {
            return $this->customResponse("Not existing or deleted already",[],404,false);
        } else {
            $employee->delete();
            return $this->customResponse('Deleted successfully',new EmployeeResource($employee));
        }
    }
    private function updateRules($id){
        return [
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:employees,email,' . $id,
            'phone_number' => 'sometimes|string|max:15',
        ];
    }
}
