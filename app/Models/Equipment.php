<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    public $table = "Equipment";
    public $timestamps = false;
    protected $fillable = [
		'Model_No', 'Brand_Name', 'Load_Capacity', 'Status','Order_ID', 'Equipment_Type','ID'
	];
}
