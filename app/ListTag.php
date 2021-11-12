<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTag extends Model
{
    protected $fillable = ['tag', 'slug'];
    protected $table = 'list_tag';
}
