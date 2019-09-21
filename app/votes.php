<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class votes extends Model
{
    protected $table = "votes";

    protected $primaryKey = "vote_id";

    protected $fillable = [
        'voter_id', 'candidate_id', 'election_id','position_id'
    ];

    protected function user(){
        return $this->belongsTo('App\User', 'voter_id', 'id');
    }
}
