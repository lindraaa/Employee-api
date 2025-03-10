<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ServiceRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;
use App\Models\Department;
use App\Models\ServiceRecord;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//To Private Routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post("/logout", [AdminController::class, "logout"]);
    // Route::get("/employee", [EmployeeController::class, "get_employee"]);

    //Employee Routes
    Route::get("/employee", [EmployeeController::class, "get_employee"]);
    Route::get("/employee/{id}", [EmployeeController::class, "find_employee"]);
    Route::post("/employee", [EmployeeController::class, "create_employee"]);
    Route::put("/employee/{id}", [EmployeeController::class, "update_employee"]);
    Route::delete("/employee/{id}", [EmployeeController::class, "delete_employee"]);

    //Department Routes
    Route::get("/department", [DepartmentController::class, "get_department"]);
    Route::get("/department/{id}", [DepartmentController::class, "find_department"]);
    Route::post("/department", [DepartmentController::class, "create_department"]);
    Route::put("/department/{id}", [DepartmentController::class, "update_department"]);
    Route::delete("/department/{id}", [DepartmentController::class, "delete_department"]);

    //Service Records Routes
    Route::get("/serviceRecord", [ServiceRecordController::class, "get_serviceRecord"]);
    Route::get("/serviceRecord/{id}", [ServiceRecordController::class, "find_serviceRecord"]);
    Route::post("/serviceRecord", [ServiceRecordController::class, "create_serviceRecord"]);
    Route::put("/serviceRecord/{id}", [ServiceRecordController::class, "update_serviceRecord"]);
    Route::delete("/serviceRecord/{id}", [ServiceRecordController::class, "delete_serviceRecord"]);
});
//Public Routes
Route::post("/onlySecret", [AdminController::class, "adminonly"]);
Route::post("/adminlogin", [AdminController::class, "login"]);

