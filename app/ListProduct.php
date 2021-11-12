<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListProduct extends Model
{
    protected $fillable = ['name', 'price', 'category', 'description', 'image'];
    protected $table = 'list_product';
}
