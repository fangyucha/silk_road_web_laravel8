<?php

namespace App;

use App\Events\DoMovement;
use App\Events\BuildFort;
use App\Events\BuildTemple;
use App\Events\BuildCastle;
use App\Events\Rob;
use App\Events\Trade;
use App\Events\Cancel;

class Player
{
    public $character; //遊戲角色代碼 0:拜占庭 1:阿拉伯 2:笈多 3:唐帝國
    public $roomid;
    public $coin = 10; //錢 初始10
    public $tresure = 0; //特產
    public $time_used = 0; //時間
    public $stepsCount = 0; //步數
    public $sold = 0; //交易數量
    public $fort = 0; //要塞數量
    public $temple = 0; //神廟數量
    public $castle = 0; //驛站數量
    public $build = ''; //建築名稱
    public $camel = false;
    public $horse = false;
    public $rob_times = 0; //掠奪次數
    public $sell_amount = 0; //賣特產獲得金錢數
    public $steps = [];

    public function __construct($oldPlayer, $character, $roomid)
    {
        if  ($oldPlayer){
            // time_used, steps 不用複製
            $this->character = $oldPlayer->character;
            $this->roomid = $oldPlayer->roomid;
            $this->coin = $oldPlayer->coin;
            $this->tresure = $oldPlayer->tresure;
            $this->sold = $oldPlayer->sold;
            $this->fort = $oldPlayer->fort;
            $this->temple = $oldPlayer->temple;
            $this->castle = $oldPlayer->castle;
            $this->camel = $oldPlayer->camel;
            $this->horse = $oldPlayer->horse;
            $this->rob_times = $oldPlayer->rob_times;
            $this->sell_amount = $oldPlayer->sell_amount;
            $this->steps = $oldPlayer->steps;
        }else{
            $this->character = $character;
            $this->roomid = $roomid;
        }
    }

    public function roundUpdate(){
        $this->tresure += 1;
        $this->coin += $this->castle; //每座驛站加1錢
        $this->coin -= $this->fort; //每座要塞減1錢
        $this->coin += $this->temple * 5; //每座神廟加2錢
    }

    // DoMovement
    public function doMovement($movementType, $movementData){
        if ($movementType == 'walk'){
            //$this->walk($movementData->stepsCount, $movementData->otherCastle);//1
            broadcast(new DoMovement($movementData))->toOthers(); // 回傳走過的地方
            //return $this->stepsCount;
        }elseif ($movementType == 'trade'){
            //$this->trade();//2
            broadcast(new Trade($movementData)); // 交易
        }elseif($movementType == 'sell'){
            $this->sell();//3
        }elseif($movementType == 'buy_camel'){
            $this->buyCamel();//4
        }elseif($movementType == 'buy_horse'){
            $this->buyHorse();//5
        }elseif($movementType == 'rob'){
            //$this->rob();//6
            broadcast(new Rob($movementData));
        }elseif($movementType == 'build_fort'){
            //$this->buildFort();//7
            broadcast(new BuildFort($movementData))->toOthers();
        }elseif($movementType == 'build_temple'){
            //$this->buildTemple();//8
            broadcast(new BuildTemple($movementData))->toOthers();
        }elseif($movementType == 'build_castle'){
            //$this->buildCastle();//9
            broadcast(new BuildCastle($movementData))->toOthers();
        }elseif($movementType == 'cancel'){
            broadcast(new Cancel($movementData))->toOthers();
        }
    }

    //walk
    public function walk($stepsCount, $otherCastle){
        // 紀錄步數, 他人驛站
        $this->stepsCount = $stepsCount;
        $this->coin -= $otherCastle; //走過他人的驛站，扣錢1
    }

    // trade
    public function trade(){
        $this->time_used = $time_used;
    }
    public function buyCamel(){
        $this->coin -= 5;
        $this->camel = true;
    }
    public function buyHorse(){
        $this->coin -= 5;
        $this->horse = true;
    }
    public function sell($qty, $loc){
        $moneyGet = (abs($this->character - $loc) + 1) * $qty;
        $this->coin += $moneyGet; // 距離越遠，價格越高
        $this->tresure -= $qty;
        $this->sold = $moneyGet; // 該局交易獲得的錢
        $this->sell_amount += $moneyGet;
    }
    //build
    public function buildCastle($time_used){
        $this->castle += 1;
        $this->time_used = $time_used;
        $this->build = 'castle';
    }
    public function buildTemple($time_used){
        $this->coin -= 5;
        $this->temple += 1;
        $this->time_used = $time_used;
        $this->build = 'temple';
    }
    public function buildFort($time_used){
        $this->coin -= 3;
        $this->fort += 1;
        $this->time_used = $time_used;
        $this->build = 'fort';
    }
    //rub
    public function rob($time_used){
        $this->coin -= 3;
        $this->time_used = $time_used;
        $this->rob_times += 1;
    }

    /*mission
    / 拜占庭 建造五座要塞
    / 阿拉伯 掠奪五次
    / 笈多 賣出特產獲得超過30塊
    / 唐帝國 建造七座驛站
    */
    public function mission_is_complete($character){
        if ($character == 0){
            if ($this->fort >= 5){
                return true;
            }
        }elseif ($character == 1){
            if ( $this->rob_times >= 5){
                return true;
            }
        }elseif ($character == 2){
            if ($this->sell_amount >= 30){
                return true;
            }
        }elseif ($character == 3){
            if ($this->castle >= 7){
                return true;
            }
        }
        return false;
    }
}
