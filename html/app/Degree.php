<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $fillable = [
        'degree', 'emphasis', 'degree_type'
    ];

    protected $table = 'degrees';
}
