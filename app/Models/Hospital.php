<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Paddle\Billable;

class Hospital extends Model
{
    use HasFactory, Billable;
    
    protected $guarded = [ ];

    protected $fillable = [
        'hospital_name',
       
    ];
}
