<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable =[
        'summary', 'type', 'region_id', 'priority', 'assigned_to', 'content', 'created_by', 'status', 'sla_status'
    ];

    /**
     * Get the comments for the ticket post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
