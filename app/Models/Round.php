<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;
    protected $fillable = ['player1_coin', 'player2_coin', 'player3_coin', 'player4_coin', 'player1_time_used', 'player2_time_used', 'player3_time_used', 'player4_time_used', 'player1_step', 'player2_step', 'player3_step', 'player4_step', 'player1_sold', 'player2_sold', 'player3_sold', 'player4_sold', 'player1_build', 'player2_build', 'player3_build', 'player4_build', 'game_id'];

    public function game(){
        return $this->belongsTo(Game::class);
    }

     public $player1_coin;
    public $player2_coin;
    public $player3_coin;
    public $player4_coin;
    public $player1_time_used;
    public $player2_time_used;
    public $player3_time_used;
    public $player4_time_used;
    public $player1_step;
    public $player2_step;
    public $player3_step;
    public $player4_step;
    public $player1_sold;
    public $player2_sold;
    public $player3_sold;
    public $player4_sold;
    public $player1_build;
    public $player2_build;
    public $player3_build;
    public $player4_build;

    public function __construct($player1, $player2, $player3, $player4, $game_id){
        $this->player1_coin = $player1->coin;
        $this->player2_coin = $player2->coin;
        $this->player3_coin = $player3->coin;
        $this->player4_coin = $player4->coin;
        $this->player1_time_used = $player1->time_used;
        $this->player2_time_used = $player2->time_used;
        $this->player3_time_used = $player3->time_used;
        $this->player4_time_used = $player4->time_used;
        $this->player1_step = $player1->step;
        $this->player2_step = $player2->step;
        $this->player3_step = $player3->step;
        $this->player4_step = $player4->step;
        $this->player1_sold = $player1->sold;
        $this->player2_sold = $player2->sold;
        $this->player3_sold = $player3->sold;
        $this->player4_sold = $player4->sold;
        $this->player1_build = $player1->build;
        $this->player2_build = $player2->build;
        $this->player3_build = $player3->build;
        $this->player4_build = $player4->build;
        $this->game_id = $game_id;
    }
}
