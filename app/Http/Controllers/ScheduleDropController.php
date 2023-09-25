<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule_Drop;
class ScheduleDropController extends Controller
{
    function getAllSchedule(){
        return Schedule_Drop::all();
    }
    
    function addNewSchedule(Request $request) {
        $schedule = Schedule_Drop::create([
            'First_Name' => $request['fname'],
            'Last_Name'=> $request['lname'],
            'Email'=> $request['email'],
            'Phonenumber'=> $request['phoneNumber'],
            'service'=> $request->service,
            'date' => $request->date,
            'time' => $request->time,
            'customer_ID'=>$request['customer_ID']
        ]);
        if($schedule) { return response(["message" => "Drop/pickup created"],200);} else {
            return response(["message" => "failed to create drop/pickup"], 401);
          }
    }

    function updateExistingSchedule(Request $request){
        $updated_schedule = Schedule_Drop::where('ID', $request->ID)->update([
            'First_Name' => $request['First_Name'],
            'Last_Name'=> $request['Last_Name'],
            'Email'=> $request['Email'],
            'Phonenumber'=> $request['Phonenumber'],
            'service'=> $request->service,
            'date' => $request->date,
            'time' => $request->time,
            'customer_ID'=>$request['customer_ID']
        ]);
        if($updated_schedule) { return response(["message" => "Drop/pickup updated"],200);} else {
            return response(["message" => "failed to update drop/pickup"], 401);
          }
    }
    
}
