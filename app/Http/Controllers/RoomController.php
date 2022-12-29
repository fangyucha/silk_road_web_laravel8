<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * @var Room
     */
    public $model;

    /**
     * @var RoomJoin
     */
    public $join;

    /**
     * @var Message
     */
    public $message;

    /**
     * RoomController constructor.
     *
     * @param  Room  $room
     * @param  RoomJoin  $join
     * @param  Message  $message
     */
    public function __construct(Room $room, RoomJoin $join, Message $message)
    {
        $this->model = $room;
        $this->join = $join;
        $this->message = $message;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     *
     * @Author: Roy
     * @DateTime: 2021/10/23 下午 12:15
     */
    public function store(Request $request, $id)
    {
        if ($this->checkRoomAndUser($id) === false) {
            return response()->json([
                'status'       => false,
                'message'      => '房間狀態有誤',
                'redirect_uri' => route('room.chat', ['id' => $id]),
            ]);
        }
        $this->message->create(
            [
                'user_id' => Auth::user()->id,
                'room_id' => $id,
                'date'    => Carbon::now()->toDateString(),
                'content' => $request->get('content'),
            ]
        );
        broadcast((new RoomMessageChannelEvent(['user' => Auth::user(), 'content' => $request->get('content')], $id)));
        return response()->json([
            'status'  => true,
            'message' => null,
        ]);
    }
}
