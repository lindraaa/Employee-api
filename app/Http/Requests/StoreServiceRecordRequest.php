<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreServiceRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "employee_id"=>"required|integer",
            "department_id"=>"required|integer",
            "position"=>"required|string",
            "start_date"=>"required|string",
            "end_date"=>"required|string",
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'code'=>422,
                'success'=>false,
                'message'=>"Validation failed",
                'response' => $validator->errors()
            ],422)
        );
    }
}
