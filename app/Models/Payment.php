<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
      'name','type','iban', 'expiry', 'cc', 'ccv'
    ];
    
    // protected $hidden = ['id'];
}