<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('room.{roomid}', function ($user, $roomid) {
    $game = \App\Models\Game::find($roomid);
    $arrUserId = $game->getArrUserId();
    if(in_array($user->id, $arrUserId)){
        $character = array_search($user->id, $arrUserId); // 0, 1, 2, 3 遊戲角色代碼 0:拜占庭 1:阿拉伯 2:笈多 3:唐帝國
        session(['character' => $character]);
        return ['id' => $user->id, 'character' => $character];
    }
});
