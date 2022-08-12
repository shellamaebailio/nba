<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
    protected $table = 'roster';
    // protected $with = ['playerTotal', 'team'];
    protected $with = ['playerTotal'];
    protected $keyType = 'string';

    public function playerTotal()
    {
        return $this->hasMany('App\PlayerTotal', 'player_id', 'id');
    }

    // public function team(){
    //     return $this->hasOne('App\Team', 'code', 'team_code');
    // }
}
