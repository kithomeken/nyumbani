<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'region_name', 'region_code', 'created_by', 'completed', 'deleted'
    ];
}
