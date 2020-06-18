<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketTypes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'ticket_code', 'system_defined', 'created_by', 'deleted', 'ttr', 'escalate', 'compliance'
    ];
}
