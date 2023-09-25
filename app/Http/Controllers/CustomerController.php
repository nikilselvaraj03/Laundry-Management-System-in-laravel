<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    function getAllCustomers() {
        return Customer::all();
    }

    function deleteCustomer(Request $request) {
       return Customer::where('ID',$request->ID)->delete();
    } 
}
