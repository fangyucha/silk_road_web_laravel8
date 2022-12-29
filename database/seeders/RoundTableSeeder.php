<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoundTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $round = new \App\Models\Round([
            'player1_coin' => 0,
            'player2_coin' => 0,
            'player3_coin' => 0,
            'player4_coin' => 0,
            'player1_time_used' => 10,
            'player2_time_used' => 10,
            'player3_time_used' => 10,
            'player4_time_used' => 10,
            'player1_step' => 10,
            'player2_step' => 10,
            'player3_step' => 10,
            'player4_step' => 10,
            'player1_sold'=> 0,
            'player2_sold'=> 0,
            'player3_sold'=> 0,
            'player4_sold'=> 0,
            'player1_build'=>"",
            'player2_build'=>"",
            'player3_build'=>"",
            'player4_build'=>"",
            'game_id'=>1,
        ]);
        $round->save();
    }
}
