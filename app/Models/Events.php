<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'date',
        'location',
        'description'
    ];
}
