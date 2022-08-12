<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerTotal extends Model
{
    protected $table = 'player_totals';
    protected $keyType = 'string';

    protected $with = ['player'];

    public function player()
    {
        return $this->hasOne('App\Roster', 'id');
    }
}
