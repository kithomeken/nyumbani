<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tickets_id', 'user_id', 'comment'
    ];

    /**
     * Get the user that owns the comment.
     */
    public function owner() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
