<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $fillable = [
        'list_id','title', 'description', 'urgency', 'done'
    ];
}
