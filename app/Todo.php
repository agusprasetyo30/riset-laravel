<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = "todos";

    protected $fillable = [
        'todo', 'status', 'todo_id_string'
    ];

    protected $guarded = [];
}
