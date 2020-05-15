<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'ticket_id', 'user_id', 'comment'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
