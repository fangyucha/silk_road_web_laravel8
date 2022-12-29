<?php

namespace App;

class Room
{
    public $arr_users_id = [];
    public $arr_rounds_id = [];
    public $num_user = 0;

    public function __construct($oldRoom){
      if($oldRoom){
        $this->arr_users_id = $oldRoom->arr_users_id;
        $this->arr_rounds_id = $oldRoom->arr_rounds_id;
        $this->num_user = $oldRoom->num_user;
      }
    }

    public function addUser($uesr_id){
      array_push($this->arr_users_id, $user_id);
      $this->num_user ++;
    }

    public function addRound($round_id){
      array_push($this->arr_rounds_id, $user_id);
    }

}
