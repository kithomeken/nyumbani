<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $fillable = [
        'user_id', 'token', 'expire_at', 'is_valid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
