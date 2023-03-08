@extends('layouts.post')

@section('title')
    遊戲規則
@endsection

@section('content')
    <div class="row">
        <div class="contents col-sm-4 col-md-3 col-lg-2">
            <nav id="navbar-example3" class="h-100 flex-column align-items-stretch pe-4 border-end">
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link" href="#round">回合制</a>
                    <a class="nav-link" href="#goal">遊戲目標</a>
                    <a class="nav-link" href="#culture">文明&特產</a>
                    <a class="nav-link" href="#move">移動</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ms-3 my-1" href="#move-1">走法</a>
                        <a class="nav-link ms-3 my-1" href="#move-2">地形</a>
                        <a class="nav-link ms-3 my-1" href="#move-3">坐騎</a>
                    </nav>
                    <a class="nav-link" href="#construction">建築</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link ms-3 my-1" href="#construction-1">驛站</a>
                        <a class="nav-link ms-3 my-1" href="#construction-2">要塞</a>
                        <a class="nav-link ms-3 my-1" href="#construction-3">神廟</a>
                    </nav>
                    <a class="nav-link" href="#over">結束條件與獲勝條件</a>
                </nav>
            </nav>
        </div>

        <div class="content col-sm-8 col-md-9 col-lg-10">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                class="scrollspy-example-2" tabindex="0">
                <div id="round">
                    <h4>回合制</h4>
                    <p>金色絲路採用回合制，四位玩家輪流行走，再建造、掠奪或貿易</p>
                    <p>每回合都只能進行一次掠奪、建造和貿易，完成後即留在原地。</p>
                    <p>建造、掠奪或貿易之前，若沒用完的步數即視同放棄</p>
                </div>
                <div id="goal">
                    <h4>遊戲目標</h4>
                    <p>獲勝條件為比較最終金幣數多寡</p>
                    <p>同時依照文明版圖引導，推動文明進程</p>
                    <p>在各文明交流的過程中，玩家也會獲得意想不到的遊戲優勢</p>
                </div>
                <div id="culture">
                    <h4>文明&特產</h4>
                    <p>四位玩家分別扮演:</p>
                    <ul>
                        <li>拜占庭帝國</li>
                        <li>阿拉伯帝國</li>
                        <li>笈多王朝</li>
                        <li>唐帝國</li>
                    </ul>
                    <p>每個文明都有自己的特產，每回合結束時自動生產一枚</p>
                    <!--補充 圖片-->
                </div>
                <div id="move">
                    <h4>移動</h4>
                </div>
                <div id="move-1">
                    <h5>走法</h5>
                    <p>每位玩家根據角色背景族群不同特色</p>
                    <p>每回合可走各自的固定步數，如：阿拉伯屬遊牧民族，固可走較多步數</p>
                    <p>首次有人經過之處，即形成道路</p>
                    <p>途經已有道路處，玩家步數×2倍，未走完步數作廢</p>
                </div>
                <div id="move-2">
                    <h5>地形</h5>
                    <p>草地、沙漠、高山、水域四種</p>
                    <p>高山(深褐色)：行走速度÷2</p>
                    <p>草地(草綠色)：行走速度如常</p>
                    <p>沙漠(米黃色)：不可行走 (除非有駱駝)</p>
                    <p>水域(水藍色)：不可行走</p>
                    <!--補充 圖片-->
                </div>
                <div id="move-3">
                    <h5>坐騎</h5>
                    <p>坐騎需透過大城市購買，可提升角色行走步數或是穿行能力</p>
                    <p>馬匹步數+4</p>
                    <p>駱駝步數+2、可通過沙漠</p>
                    <!--補充 圖片-->
                </div>
                <div id="construction">
                    <h4>建築</h4>
                </div>
                <div id="construction-1">
                    <h5>驛站</h5>
                    <!--補充 圖片-->
                    <p><b>在城市(地圖藍色區)花費1枚金幣建造，每回合獲得1枚金幣/座</b></p>
                    <p>驛站在絲路中扮演著重要角色，</p>
                    <p>是商人歇腳之處，是使節補充養給之所，</p>
                    <p>有時甚至還是各方勢力角逐的兵家必爭之地。</p>
                </div>
                <div id="construction-2">
                    <h5>要塞</h5>
                    <!--補充 圖片-->
                    <p><b>需支付3枚金幣建造費</b></p>
                    <p>數百年來，絲路早已見識了無數王朝更迭的是是非非，</p>
                    <p>在這條橫跨東西，卻又流淌著金銀、奶與蜜的古道上，</p>
                    <p>拳頭大即為硬道理。</p>
                </div>
                <div id="construction-3">
                    <h5>神廟</h5>
                    <!--補充 圖片-->
                    <p><b>需支付5枚金幣建造於聖地(地圖橘色區)，後續每回合可提供被動收入2枚金幣</b></p>
                    {{-- <ul>
                        <li>若在自己的領域，每回合可以獲得3枚金幣收入</li>
                        <li>若在他人的領域，每回合可以獲得2枚金幣收入</li>
                    </ul> --}}
                    <p>挪威史學家，安提⬝維契爾，曾說：</p>
                    <p>「每當外在政局最混沌黑暗時，人心中也是一樣徬徨無助，</p>
                    <p>此時信仰能在人心裡點亮一盞明燈，為迷惘的人們，</p>
                    <p>成為明早起床面對不幸的動力。」</p>
                    <ul>
                        <li>終南山</li>
                        <li>拉薩</li>
                        <li>恆河</li>
                        <li>麥加</li>
                        <li>君士坦丁</li>
                        <li>耶路撒冷</li>
                    </ul>
                </div>
                <div id="over">
                    <h4>結束條件與獲勝條件</h4>
                    <p>玩家可從驛站或其他管道獲得收入金幣。</p>
                    <p>並以金幣購買坐騎或他人的特產，又或者建造建物</p>
                    <p>完成政治、經濟、信仰等文明進步目標。</p>
                    <p>結束條件：</p>
                    <p>3家皆收集所有文明版圖後，再開始算2回合結束遊戲。</p>
                    <p>獲勝條件：</p>
                    <p>分數 = 1*金幣數+2*建築物數量+5*任務完成</p>
                    <p>總得分數最高者獲勝。</p>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/gameRule.css') }}">
@endsection
