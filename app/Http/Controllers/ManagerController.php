<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personel;
class ManagerController extends Controller
{
    function getAllManagers() {
        return Personel::where('User_Type','Manager')->get();
    }

    function deleteManager(Request $request) {
        return Personel::where('ID',$request->ID)->delete();
    } 
}
