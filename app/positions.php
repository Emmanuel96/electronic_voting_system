<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class positions extends Model
{
    protected $table = "position";
    protected $primaryKey = "position_id";
    protected $fillable = [
        'election_id', 'position_name'
    ];


    public function candidates(){
        return $this->hasMany('App\Candidate', 'candidate_position_id', 'position_id');
    }
}
