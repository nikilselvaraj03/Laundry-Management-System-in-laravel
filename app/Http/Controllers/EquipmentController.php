<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
class EquipmentController extends Controller
{
    function getAllEquipments() {
        return Equipment::all();
    }

    function deleteEquipment(Request $request) {
        return Equipment::where('ID',$request->ID)->delete();
    } 

    function addNewEquipment(Request $request) {
        $equipment = Equipment::create([
          'Brand_Name' => $request['Brand_Name'],
          'Equipment_Type'=> $request['Equipment_Type'],
          'Model_No'=> $request['Model_No'],
          'Status'=> $request->Status,
          'Load_Capacity'=> $request['Load_Capacity'],
          'Order_ID' => $request['Order_ID']
        ]);
  
      if($equipment) { return response(["message" => "equipment created"],200);} else {
        return response(["message" => "failed to create equipment"], 401);
      }
      }
  
      function updateExistingEquipment(Request $request) {
        $updated_equipment = Equipment::where('ID', $request->ID)->update([
          'Brand_Name' => $request['Brand_Name'],
          'Equipment_Type'=> $request['Equipment_Type'],
          'Model_No'=> $request['Model_No'],
          'Status'=> $request->Status,
          'Load_Capacity'=> $request['Load_Capacity'],
          'Order_ID' => $request['Order_ID']
        ]);
  
        if($updated_equipment) { return response(["message" => "equipment updated"],200);} else {
          return response(["message" => "failed to update equipment"], 401);
        }
      }
}
