<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryContent extends Model
{
    protected $fillable = ['name', 'slug', 'status'];
    protected $table = 'category_content';
}
