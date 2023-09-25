<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    use HasFactory;
    public $table = "Contact_Us";
    public $timestamps = false;
    protected $fillable = [
		'First_Name', 'Last_Name', 'Phonenumber' ,'Email', 'query'
	];
}