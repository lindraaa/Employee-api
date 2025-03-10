<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRecordRequest;
use App\Http\Resources\ServiceRecord\ServiceRecordCollection;
use App\Http\Resources\ServiceRecord\ServiceRecordResource;
use App\Models\ServiceRecord;
use Illuminate\Http\Request;

class ServiceRecordController extends Controller
{
    //
    function get_serviceRecord()
    {
        $allServiceRecord = ServiceRecord::all();
        if (!$allServiceRecord->isEmpty()) {
            return $this->customResponse('list of Service Record',new ServiceRecordCollection($allServiceRecord));
        } else {
            return $this->customResponse('No available Service Record',[],404);
        }
    }
    function find_serviceRecord(Request $req){
        $serviceRecord = ServiceRecord::find($req->id);
        if (!$serviceRecord) {
            return $this->customResponse("Service Record not found",[],404,false);
        }
        return $this->customResponse("Service Found", new ServiceRecordResource($serviceRecord));

    }
    function create_serviceRecord(StoreServiceRecordRequest $req)
    {
        //for data validation
        $validated = $req->validated();
        $serviceRecord = ServiceRecord::create($validated);
        return  $this->customResponse("Service Record created successfully",new ServiceRecordResource($serviceRecord));

    }
    function update_serviceRecord(StoreServiceRecordRequest $req)
    {
        $serviceRecord = ServiceRecord::find($req->id);

        if (!$serviceRecord) {
            return $this->customResponse('No available Service Record',[],404);
        }{
            //for data validation
            $validated = $req->validated();
            $serviceRecord->update($validated);
            return  $this->customResponse("Service Record Update successfully",new ServiceRecordResource($serviceRecord));
           
        }
    }
    function delete_serviceRecord(Request $req)
    {
        $serviceRecord = ServiceRecord::find($req->id);

        if (!$serviceRecord) {
            return $this->customResponse('Not existing or deleted already',[],404);
        } else {
            $serviceRecord->delete();
            return  $this->customResponse("Deleted successfully",[]);
        }
    }
}