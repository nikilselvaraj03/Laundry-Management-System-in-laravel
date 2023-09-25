<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe_Service extends Model
{
    use HasFactory;
    public $table="Subscribe_Service";
    public $timestamps = false;
    protected $fillable = [
		'First_Name', 'Last_Name', 'Email', 'Phonenumber', 'subscribe','plan','day','address','city','State','cust_ID'
	];
}
