<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fyp extends Model
{
    protected $fillable = [
        'stud_id', 'course', 'semester'
    ];

    protected $table = 'fyp';
}
