<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'ticket_id', 'action_by', 'action_type', 'description', 'file_name'
    ];

    public function actionBy(){
        return $this->belongsTo('App\User', 'action_by', 'id');
    }
}
