<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;
    // protected $fillable = ['player1_coin', 'player2_coin', 'player3_coin', 'player4_coin', 'player1_time_used', 'player2_time_used', 'player3_time_used', 'player4_time_used', 'player1_step', 'player2_step', 'player3_step', 'player4_step', 'player1_sold', 'player2_sold', 'player3_sold', 'player4_sold', 'player1_build', 'player2_build', 'player3_build', 'player4_build', 'game_id'];
    protected $fillable = ['players_data', 'players_step', 'game_id'];

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function walks(){
        return $this->hasMany(Round::class);
    }
}
