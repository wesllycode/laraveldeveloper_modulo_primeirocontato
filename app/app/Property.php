<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';

    protected $fillable = ['title', 'nameslugimovel', 'description','rental_price', 'sale_price','img'];

    public $timestamps = false;
}
