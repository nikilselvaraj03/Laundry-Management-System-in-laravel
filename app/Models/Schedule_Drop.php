<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_Drop extends Model
{
    use HasFactory;
    public $table = "Schedule_Drop";
    public $timestamps = false;
    protected $fillable = [
		'First_Name', 'Last_Name', 'Email', 'Phonenumber', 'service','customer_ID','date','time'
	];
}
