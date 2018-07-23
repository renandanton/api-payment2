<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $fillable = ['payment_id', 'amount'];
    
    // protected $hidden = ['id'];
}