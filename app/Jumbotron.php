<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jumbotron extends Model
{
    protected $fillable = ['title', 'image', 'image1', 'image2', 'image3', 'date'];
    protected $table = 'table_jumbotron';
}
