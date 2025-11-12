<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tower extends Model
{
     protected $guarded = ['id'];

  // Rules untuk create dan update
    public $rules = [
        'create' => [
            'name' => 'required|string|max:100|unique:towers,name',
        ],
        'update' => [
            'name' => 'required|string|max:100|unique:towers,name,{id}',
        ],
    ];
}
