<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'email', 'title', 'description', 'status', 'created_at'
    ];
}
