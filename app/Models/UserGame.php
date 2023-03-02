<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserGame extends Model
{
    use HasFactory;
    protected $table = 'user_game';
    // protected $fillable = [
    //     'user_id',
    //     'game_id',
    //     'created_at',
    //     'updated_at',
    // ];

    public function memberNum($game_id)
    {
        return $this->where([
            'game_id' => $game_id,
        ])->count();
    }

     public function checkUserJoined($game_id)
    {
        return $this
            ->where('user_id', Auth::user()->id)
            ->where('game_id', $game_id)
            ->exists();
    }

}
