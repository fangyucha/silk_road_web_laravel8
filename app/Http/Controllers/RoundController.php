<?php

namespace App\Http\Controllers;

use App\Models\Round;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function getRoundData(){
        /* TODO:可以拿資料，填入view就可接
        $roundData = Round::all();
        return view('', ['roundData' => $roundData ])
        */
    }
    public function store(Request $request){
        $round = new Round;
        // column
        //'player1_coin', 'player2_coin', 'player3_coin', 'player4_coin', 'player1_time_used', 'player2_time_used', 'player3_time_used', 'player4_time_used', 'player1_step', 'player2_step', 'player3_step', 'player4_step', 'player1_sold', 'player2_sold', 'player3_sold', 'player4_sold', 'player1_build', 'player2_build', 'player3_build', 'player4_build', 'game_id'
        $round->player1_coin = $request->input('player1_coin');

        $round->save();
        return;
    }
}
