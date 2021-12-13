<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $fillable = [
      'name',
      'title',
      'priority',
      'image',
      'designation',
      'desc',
    ];
}
