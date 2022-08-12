<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'team';
    // protected $with = ['player'];

    // public function player(){
    //     return $this->hasMany('App\Roster', 'team_code', 'code');
    // }
}
