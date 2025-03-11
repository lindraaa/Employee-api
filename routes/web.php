<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceRecordController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Department;
use App\Models\ServiceRecord;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    abort(403);
});

// //Employee Routes
// Route::get("/employee",[EmployeeController::class,"get_employee"]);
// Route::get("/employee/{id}",[EmployeeController::class,"find_employee"]);
// Route::post("/employee",[EmployeeController::class,"create_employee"]);
// Route::put("/employee/{id}",[EmployeeController::class,"update_employee"]);
// Route::delete("/employee/{id}",[EmployeeController::class,"delete_employee"]);

// //Deparment Routes
// Route::get("/department",[DepartmentController::class,"get_department"]);
// Route::get("/department/{id}",[DepartmentController::class,"find_department"]);
// Route::post("/department",[DepartmentController::class,"create_department"]);
// Route::put("/department/{id}",[DepartmentController::class,"update_department"]);
// Route::delete("/department/{id}",[DepartmentController::class,"delete_department"]);

// //Service Records Routes

// Route::get("/serviceRecord",[ServiceRecordController::class,"get_serviceRecord"]);
// Route::get("/serviceRecord/{id}",[ServiceRecordController::class,"find_serviceRecord"]);
// Route::post("/serviceRecord",[ServiceRecordController::class,"create_serviceRecord"]);
// Route::put("/serviceRecord/{id}",[ServiceRecordController::class,"update_serviceRecord"]);
// Route::delete("/serviceRecord/{id}",[ServiceRecordController::class,"delete_serviceRecord"]);



// Route::get("/test", function () {
//     $employee =  Employee::create([
//         "name" => "Kelly De Guzman",
//         "email" => "kelly@gmail.com",
//         "phone_number" => 12345
//     ]);
//     return response()->json($employee);
// });

// Route::get("/testd", function () {
//     Department::create([
//         "name" => "Information Technology",
//         "description" => " Manages, supports, and develops information and communication technology (ICT) infrastructure."

//     ]);
// });
// Route::get("/testSR", function () {
//     ServiceRecord::create([
//         "employee_id" => 2,
//         "department_id" => 1,
//         "position" => "QA",
//         "start_date" =>  "2024-12-4",
//         "end_date" => "2025-12-4"

//     ]);
// });

// Route::get("/testdata", function () {
//     // get all service records for an employee
//     $employee = Employee::find(1);
//     $serviceRecords = $employee->employee_service_records;
//     return response()->json($serviceRecords);

//     $serviceRecord = ServiceRecord::find(1);
//      $employee = $serviceRecord->employee;
//      $department = $serviceRecord->department;
//     return response()->json($serviceRecord );
//     $serviceRecords = ServiceRecord::with(['employee', 'department'])->get();
//     return response()->json($serviceRecords);
// });
