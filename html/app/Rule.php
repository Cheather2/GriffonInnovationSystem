<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'degree_id', 'course_name', 'fall', 'spring'
    ];

    protected $table = 'rules';
}
