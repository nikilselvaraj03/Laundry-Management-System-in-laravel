<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\RegisterIncident;
use App\Http\Controllers\ScheduleDropController;
use App\Http\Controllers\ChatController;
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

Route::post('/authenticate',[LoginController::class,'authenticateUser']);
Route::post('/register',[RegisterUserController::class,'registerUser']);
Route::get('/getorders',[OrderController::class,'getAllOrders']);
Route::get('/getcustomers',[CustomerController::class,'getAllCustomers']);
Route::get('/getemployees',[EmployeeController::class,'getAllEmployees']);
Route::get('/getmanagers',[ManagerController::class,'getAllManagers']);
Route::get('/getequipments',[EquipmentController::class,'getAllEquipments']);
Route::get('/getpickups',[PickupController::class,'getAllPickups']);
Route::get('/getschedule',[ScheduleDropController::class,'getAllSchedule']);

Route::post('/deleteorder',[OrderController::class,'deleteOrder']);
Route::post('/deletecustomer',[CustomerController::class,'deleteCustomer']);
Route::post('/deleteemployee',[EmployeeController::class,'deleteEmployee']);
Route::post('/deletemanager',[ManagerController::class,'deleteManager']);
Route::post('/deleteequipment',[EquipmentController::class,'deleteEquipment']);
Route::post('/deletepickup',[PickupController::class,'deletePickup']);

Route::post('/addorder',[OrderController::class,'addNewOrder']);
Route::post('/addequipment',[EquipmentController::class,'addNewEquipment']);
Route::post('/addschedule',[ScheduleDropController::class,'addNewSchedule']);
Route::post('/addsubcription',[PickupController::class,'addNewSubscription']);
Route::post('/addplaceorder',[OrderController::class,'addPlaceOrder']);       

Route::post('/updateorder',[OrderController::class,'updateExistingOrder']);
Route::post('/updateequipment',[EquipmentController::class,'updateExistingEquipment']);
Route::post('/updateschedule',[ScheduleDropController::class,'updateExistingSchedule']);

Route::post('/contactus',[ContactUsController::class,'contactUs']);
Route::post('/registerIncident',[RegisterIncident::class,'registerIncident']);


Route::get('/getmessages',[ChatController::class,'getAllMessages']);
Route::post('/postmessage',[ChatController::class,'postmessage']);