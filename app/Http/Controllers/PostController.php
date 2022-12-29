<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('post.index');
    }

    public function enteringGame(){
        return view('post.enteringGame');
    }

    public function gameRule(){
        return view('post.gameRule');
    }

    public function gameDevelopment(){
        return view('post.gameDevelopment');
    }

    public function intro_constantinopolis(){
        return view('post.intro_constantinopolis');
    }

    public function intro_dunhuang(){
        return view('post.intro_dunhuang');
    }

    public function intro_samarqand(){
        return view('post.intro_samarqand');
    }

    public function intro_changan(){
        return view('post.intro_changan');
    }

    public function game(){
        return view('game.game');
    }

    //TODO:刪除
    public function demo(){
        return view('game.demo');
    }
    //TODO
    public function test(){
        return view('post.test');
    }

    public function wait(){
        return view('game.wait');
    }

}
