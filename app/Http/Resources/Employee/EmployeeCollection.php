<?php

namespace App\Http\Resources\Employee;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->name,
                    'email' => $employee->email,
                    'phoneNumber' => $employee->phone_number,
                ];
            }),
            'meta' => [
                'total' => $this->collection->count(),
            ],
        ];
    }
    //ONLY DATA WITHOUT TOTAL
    // return
    // $this->collection->transform(function ($employee) {
    //     return [
    //         'id' => $employee->id,
    //         'name' => $employee->name,
    //         'email' => $employee->email,
    //         'phoneNumber' => $employee->phone_number,
    //     ];
    // });

}
