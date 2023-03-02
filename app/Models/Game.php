<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable= ['users_id', 'game_result_id'];
    protected $casts = [
        'users_id' => 'array',
        //'rounds_id' => 'array'
    ];

    public function rounds(){
        return $this->hasMany(Round::class);
    }

    public function users()
    {
         return $this->belongsToMany(User::class, 'user_game');
    }

    public function getArrUserId(){
        return $this -> users_id;
    }

    public function getUserIdNum(){
        return count($this -> users_id);
    }
}
