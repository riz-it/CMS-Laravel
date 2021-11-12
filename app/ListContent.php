<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListContent extends Model
{
    protected $fillable = ['title', 'description', 'closing', 'category', 'image'];
    protected $table = 'list_content';
}
