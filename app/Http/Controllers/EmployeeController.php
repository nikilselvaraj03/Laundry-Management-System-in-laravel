<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personel;
class EmployeeController extends Controller
{
    function getAllEmployees() {
        return Personel::where('User_Type','Employee')->get();
    }

    function deleteEmployee(Request $request) {
        return Personel::where('ID',$request->ID)->delete();
    } 
}
