<?php

namespace App\Http\Resources\ServiceRecord;

use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\Employee\EmployeeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "employee_id"=> $this->employee_id,
            "postion"=>$this->position,
            "department_id"=>$this->department_id,
            "start_date"=>$this->start_date,
            "end_date"=>$this->end_date,
            "employeeDetails"=> new EmployeeResource($this->employee),
            "departmentDetails"=>new DepartmentResource($this->department),
        ];   
    }
}
