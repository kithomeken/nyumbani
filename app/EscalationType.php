<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalationType extends Model
{
    protected $fillable = [
        'ticket_description', 'ticket_code', 'system_defined',
    ];
}
