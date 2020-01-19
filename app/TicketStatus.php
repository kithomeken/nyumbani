<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketStatus extends Model
{
    protected $fillable = [
        'description', 'status_code', 'created_by', 'deleted', 'system_defined'
    ];
}
