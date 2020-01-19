<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscalationTeam extends Model
{
    protected $fillable = [
        'user_id', 'name', 'email', 'designation'
    ];
}
