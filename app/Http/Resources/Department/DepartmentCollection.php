<?php

namespace App\Http\Resources\Department;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartmentCollection extends ResourceCollection
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
            'data'=> $this->collection->transform(function($department){
                return[
                    "id"=>$department->id,
                    "name"=>$department->name,
                    "description"=>$department->description,
                ];
            }),
            "meta"=>[
                "total"=>$this->collection->count(),
            ],
        ];
    }
}
