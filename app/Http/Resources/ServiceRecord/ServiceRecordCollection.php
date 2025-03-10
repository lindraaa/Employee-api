<?php

namespace App\Http\Resources\ServiceRecord;

use App\Http\Resources\Department\DepartmentResource;
use App\Http\Resources\Employee\EmployeeResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ServiceRecordCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "data"=> $this->collection->transform(function($serviceRecord){
                return[
                    "id"=>$serviceRecord->id,
                    "employee_id"=> $serviceRecord->employee_id,
                    "postion"=>$serviceRecord->position,
                    "department_id"=>$serviceRecord->department_id,
                    "start_date"=>$serviceRecord->start_date,
                    "end_date"=>$serviceRecord->end_date,
                    "employee_details"=> $serviceRecord->employee? new EmployeeResource($serviceRecord->employee):null,
                    "department_details"=> $serviceRecord->department? new DepartmentResource($serviceRecord->department): null,
                ];
            })
        ];
    }
}
