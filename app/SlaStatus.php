<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlaStatus extends Model
{
    protected $fillable = [
        'status_code', 'status_description'
    ];
}
