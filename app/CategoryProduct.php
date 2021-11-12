<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = ['name', 'slug', 'status'];
    protected $table = 'category_product';
}
