<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidate extends Model
{
    protected $table = "candidates";
    protected $primaryKey = "candidate_id";
    protected $fillable = [
        'candidate_position_id', 'candidate_image', 'candidate_user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'candidate_user_id', 'id');
    }

    public function votes(){
        return $this->hasMany('App\votes', 'candidate_id', 'candidate_id');
    }
}
