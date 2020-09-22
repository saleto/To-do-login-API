<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    protected $table = 'todo';
    protected $fillable = ['todo', 'category', 'user_id', 'description'];
}
