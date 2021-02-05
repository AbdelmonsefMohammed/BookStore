<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'payment_date',
        'amount',
        'products',
    ];
}