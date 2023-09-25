<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscribe_Service;
class PickupController extends Controller
{
    function getAllPickups(){
        return Subscribe_Service::all();
    }

    function deletePickup(Request $request) {
        return Subscribe_Service::where('ID',$request->ID)->delete();
    }

    function addNewSubscription(Request $request){
        $subscription = Subscribe_Service::create([
            'First_Name' => $request['fname'],
            'Last_Name'=> $request['lname'],
            'Email'=> $request['email'],
            'Phonenumber'=> $request['phoneNumber'],
            'subscribe' => $request['subscribe'],
            'plan' => $request['plan'],
            'day' => $request['day'],
            'address' => $request['address'],
            'city' => $request ['city'],
            'State' => $request['State'],
            'cust_ID' => $request['customerID'],
        ]);
        if($subscription) { return response(["message" => "subscription created"],200);} else {
            return response(["message" => "failed to create subscription"], 401);
          }
    }
}
