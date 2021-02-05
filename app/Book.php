<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'barCode',
        'title',
        'author',
        'price',
        'quantity',
        'available',
        'description'
    ];
}
