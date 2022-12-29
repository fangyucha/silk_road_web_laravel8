<?php

namespace App\Http\Controllers;

use App\Events\RoomFull;
use App\Models\Game;
use App\Models\UserGame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public $model;
    public $userGame;
    public $arrUserId = [];

    public function __construct(Game $model, UserGame $userGame)
    {
        $this->model = $model;
        $this->userGame = $userGame;
    }

    public function getGameData(){
        /* TODO:可以拿資料，填入view就可接
        $gameData = Game::all();
        return view('', ['gameData' => $gameData ])
        */
    }

    //  查看所有Game
    // public function viewGame(){
    //     $games = \App\Game::all();
    //     return view('wait', ['games' => $games]);
    // }

    public function connect(Request $request){
        // 沒有遊戲或是遊戲人數已滿，就建立新遊戲
        $game = \App\Models\Game::latest()->first();
        if($game == null||$game->getUserIdNum() == 4){
            $newgame = $this->createNewGame($request);
            $roomid = $newgame->id;
        }else{
            $arrUserId = $game->getArrUserId();
            $arrUserId[] = Auth::user()->id;
            $game->users_id = $arrUserId;
            $game->save();
            $roomid = $game->id;
            if($game->getUserIdNum() == 4){
                broadcast(new RoomFull($roomid));
            }
        }
        return redirect() -> route("game.waiting",['roomid' => $roomid]);
    }

    public function createNewGame(Request $request){
        $game = \App\Models\Game::create([
            'users_id' => [Auth::user()->id],
        ]);
        return $game;
    }

    public function viewWait(){
        return view('game.waiting');
    }

    public function viewGame(){
        return view('game.game');
    }
}
