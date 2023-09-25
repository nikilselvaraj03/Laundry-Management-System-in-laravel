<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_Incident extends Model
{
    use HasFactory;
    public $table = "Register_Incident";
    public $timestamps = false;
    protected $fillable = [
		'First_Name', 'Last_Name', 'Phonenumber' ,'Email', 'register' , 'query'
	];
}