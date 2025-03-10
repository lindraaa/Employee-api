<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRecordRequest;
use App\Models\ServiceRecord;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    //
    function get_serviceRecord()
    {
        $allServiceRecord = ServiceRecord::with(['employee','department'])->get();
        if (!$allServiceRecord->isEmpty()) {
            return response()->json($allServiceRecord, 200);
        } else {
            return response()->json(["message" => "No available Service Record"], 200);
        }
    }
    function find_serviceRecord(Request $req){
        $serviceRecord = ServiceRecord::with(['employee','department'])->find($req->id);
        if (!$serviceRecord) {
            return response()->json(["message" => "Service Record not found"], 404);
        }
        return response()->json($serviceRecord);

    }
    function create_serviceRecord(StoreServiceRecordRequest $req)
    {
        //for data validation
        $validated = $req->validated();
        $serviceRecord = ServiceRecord::create($validated);
        return response()->json(["message" => "Service created successfully", 
                                "Added Data:"=>$serviceRecord], 200);
    }
    function update_serviceRecord(StoreServiceRecordRequest $req)
    {
        $serviceRecord = ServiceRecord::find($req->id);

        if (!$serviceRecord) {
            return response()->json(["message" => "Service Record not found"], 404);
        }{
            //for data validation
            $validated = $req->validated();
            $serviceRecord->update($validated);
            return response()->json(["message" => "Service Record Updated Successfully",
                                    "Updated Data:"=>$serviceRecord], 200);
        }
    }
    function delete_serviceRecord(Request $req)
    {
        $serviceRecord = ServiceRecord::find($req->id);

        if (!$serviceRecord) {
            return response()->json(["message" => "Not existing or deleted already"], 404);
        } else {
            $serviceRecord->delete();
            return response()->json(["message" => "Deleted successfully","Data"=>$serviceRecord], 200);
        }
    }
}