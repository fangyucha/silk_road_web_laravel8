@extends('layouts.master')

@section('title')
    金色絲路
@endsection

@section('content')
    <!--左側滑出邊欄-->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!--<a href='{{ route('post.intro_changan') }}' class=' btn btn-outline-secondary'>更多資訊</a>-->
        <a href="#" onclick="reP()">使用者</a>
        <a href="#" onclick="openRule()">規則</a>
        <a href="#" onclick="openHistory()">歷史</a>
        <a href="#" onclick="openDevelopment()">關於</a>
    </div>
    <span class='nav' onclick="openNav()">&#9776; 選單</span>

    <!--玩家現有資源數值顯示-->
    <div class="row user" id="user_attributes">
        <div class="col">
            <span>剩餘步數：</span>
        </div>
        <div class="col">
            <span id="step">10</span>
        </div>
        <div class="col">
            <span>金幣數量：</span>
        </div>
        <div class="col">
            <span id="money">0</span>
        </div>
        <div class="col">
            <span>驛站數量：</span>
        </div>
        <div class="col">
            <span id="station">0</span>
        </div>
        <div class="col">
            <span>要塞數量：</span>
        </div>
        <div class="col">
            <span id="fort">0</span>
        </div>
        <div class="col">
            <span>神廟數量：</span>
        </div>
        <div class="col">
            <span id="temple">0</span>
        </div>
        <div class="col">
            <span>特產數量：</span>
        </div>
        <div class="col">
            <span id="supply">0</span>
        </div>
    </div>

    <!--坐騎-->
    <div class='ride'>
        <p>現有裝備</p>
        <img src={{ asset('img/horse.jpg') }} alt="馬匹" title="馬匹：步數+4" id="ride_horse" width="150px" height="200px"
            style="position:absolute;top:50px;left:10px;border-radius:15px;display:none;">
        <img src="{{ asset('img/camel.jpg') }}" alt="駱駝" title="駱駝：步數+2" id="ride_camel" width="150px" height="200px"
            style="position:absolute;top:50px;left:170px;border-radius:15px;display:none;">
    </div>

    <!--所有玩家數值-->
    <div class="all_users">
        <table>
            <thead>
                <tr>
                    <th>玩家</th>
                    <th>金幣</th>
                    <th>驛站</th>
                    <th>要塞</th>
                    <th>神廟</th>
                    <th>特產</th>
                    <th>任務</th>
                </tr>
            </thead>
            <tbody id="users-data">
                <tr>
                    <td><span><i class="fa-solid fa-chess-rook"></i>拜占庭帝國</span></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td><i class="fa-solid fa-circle-check d-none"></i></td>
                </tr>
                <tr>
                    <td><span><i class="fa-solid fa-chess-rook"></i>阿拉伯帝國</span></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td><i class="fa-solid fa-circle-check d-none"></i></td>
                </tr>
                <tr>
                    <td><span><i class="fa-solid fa-chess-rook"></i>笈多王朝</span></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td><i class="fa-solid fa-circle-check d-none"></i></td>
                </tr>
                <tr>
                    <td><span><i class="fa-solid fa-chess-rook"></i>唐帝國</span></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>1</td>
                    <td><i class="fa-solid fa-circle-check d-none"></i></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!--地圖大外框-->
    <div class='border' id='map'>
        <!--column_1 -->

        <div class='row_1'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_1'>
                <div class="box">
                    <div class='Hexagon_g walked'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">君堡</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container">
                            <img src="{{ asset('img/player_constan.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_1" class="player">
                            <div class="view_c">君堡</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t" id=>開羅</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_1'>
                <button class="butt_d">1</button>
            </div>
        </div>
        <!--column_2 -->
        <div class='row_0'>
            <div class='column_2'>
                <button class="butt_d">2</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_2'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_3 -->
        <div class='row_1'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_3'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_3'>
                <button class="butt_d">3</button>
            </div>
        </div>
        <!--column_4 -->
        <div class='row_0'>
            <div class='column_4'>
                <button class="butt_d">4</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">安條克</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">大馬士革</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">耶冷</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_5 -->
        <div class='row_1'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_5'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_5'>
                <button class="butt_d">5</button>
            </div>
        </div>
        <!--column_6 -->
        <div class='row_0'>
            <div class='column_6'>
                <button class="butt_d">6</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">報達</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">馬迪納</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">麥加</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_7 -->
        <div class='row_1'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">薩克爾</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_7'>
                <button class="butt_d">7</button>
            </div>
        </div>
        <!--column_8 -->
        <div class='row_0'>
            <div class='column_8'>
                <button class="butt_d">8</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_9 -->
        <div class='row_1'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">墨設</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_9'>
                <button class="butt_d">9</button>
            </div>
        </div>
        <!--column_10 -->
        <div class='row_0'>
            <div class='column_10'>
                <button class="butt_d">10</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_11 -->
        <div class='row_1'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_11'>
                <button class="butt_d">11</button>
            </div>
        </div>
        <!--column_12 -->
        <div class='row_0'>
            <div class='column_12'>
                <button class="butt_d">12</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container">
                            <img src="{{ asset('img/player_smar.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_2" class="player">
                            <div class="view_c">撒馬</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">藍氏城</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_13 -->
        <div class='row_1'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_13'>
                <button class="butt_d">13</button>
            </div>
        </div>
        <!--column_14 -->
        <div class='row_0'>
            <div class='column_14'>
                <button class="butt_d">14</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">怛羅斯</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">喀布爾</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_15 -->
        <div class='row_1'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">白沙瓦</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_15'>
                <button class="butt_d">15</button>
            </div>
        </div>
        <!--column_16 -->
        <div class='row_0'>
            <div class='column_16'>
                <button class="butt_d">16</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">碎葉</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">疏勒</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_17 -->
        <div class='row_1'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">于闐</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">因陀螺</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_17'>
                <button class="butt_d">17</button>
            </div>
        </div>
        <!--column_18 -->
        <div class='row_0'>
            <div class='column_18'>
                <button class="butt_d">18</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">恆河</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_19 -->
        <div class='row_1'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">且末</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_19'>
                <button class="butt_d">19</button>
            </div>
        </div>
        <!--column_20 -->
        <div class='row_0'>
            <div class='column_20'>
                <button class="butt_d">20</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">拉薩</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_21 -->
        <div class='row_1'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">高昌</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">哈密</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">婼羌</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_21'>
                <button class="butt_d">21</button>
            </div>
        </div>
        <!--column_22 -->
        <div class='row_0'>
            <div class='column_22'>
                <button class="butt_d">22</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container">
                            <img src="{{ asset('img/player_dun.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_3" class="player">
                            <div class="view_c">敦煌</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_23 -->
        <div class='row_1'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">酒泉</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">格爾木</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_23'>
                <button class="butt_d">23</button>
            </div>
        </div>
        <!--column_24 -->
        <div class='row_0'>
            <div class='column_24'>
                <button class="butt_d">24</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">張掖</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_25 -->
        <div class='row_1'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">臨洮</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">鬆州</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">順化</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_25'>
                <button class="butt_d">25</button>
            </div>
        </div>
        <!--column_26 -->
        <div class='row_0'>
            <div class='column_26'>
                <button class="butt_d">26</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">武威</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_27 -->
        <div class='row_1'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container">
                            <img src="{{ asset('img/player_chang.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_4" class="player">
                            <div class="view_c">長安</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_27'>
                <button class="butt_d">27</button>
            </div>
        </div>
        <!--column_28 -->
        <div class='row_0'>
            <div class='column_28'>
                <button class="butt_d">28</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container">
                            <div class="view_h">終南</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_29 -->
        <div class='row_1'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">燕京</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">廣州</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_31'>
            <div class='column_29'>
                <button class="butt_d">29</button>
            </div>
        </div>
        <!--column_30 -->
        <div class='row_0'>
            <div class='column_30'>
                <button class="butt_d">30</button>
            </div>
        </div>
        <div class='row_2'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class='butt_o'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container">
                            <div class="view_t">餘杭</div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>

        <div class='row_22'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_o'>
                        <button class="butt_o"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container"></button>
                    </div>
                </div>
            </div>
        </div>
        <!--右座標-->
        <div class='row_r_1'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">1</button>
                </div>
            </div>
        </div>
        <div class='row_r_2'>
            <div class='column_31'>
                <button class="butt_2">2</button>
            </div>
        </div>
        <div class='row_r_3'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">3</button>
                </div>
            </div>
        </div>
        <div class='row_r_4'>
            <div class='column_31'>
                <button class="butt_2">4</button>
            </div>
        </div>
        <div class='row_r_5'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">5</button>
                </div>
            </div>
        </div>
        <div class='row_r_6'>
            <div class='column_31'>
                <button class="butt_2">6</button>
            </div>
        </div>
        <div class='row_r_7'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">7</button>
                </div>
            </div>
        </div>
        <div class='row_r_8'>
            <div class='column_31'>
                <button class="butt_2">8</button>
            </div>
        </div>
        <div class='row_r_9'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">9</button>
                </div>
            </div>
        </div>
        <div class='row_r_10'>
            <div class='column_31'>
                <button class="butt_2">10</button>
            </div>
        </div>
        <div class='row_r_11'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">11</button>
                </div>
            </div>
        </div>
        <div class='row_r_12'>
            <div class='column_31'>
                <button class="butt_2">12</button>
            </div>
        </div>
        <div class='row_r_13'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">13</button>
                </div>
            </div>
        </div>
        <div class='row_r_14'>
            <div class='column_31'>
                <button class="butt_2">14</button>
            </div>
        </div>
        <div class='row_r_15'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">15</button>
                </div>
            </div>
        </div>
        <div class='row_r_16'>
            <div class='column_31'>
                <button class="butt_2">16</button>
            </div>
        </div>
        <div class='row_r_17'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">17</button>
                </div>
            </div>
        </div>
        <div class='row_r_18'>
            <div class='column_31'>
                <button class="butt_2">18</button>
            </div>
        </div>
        <div class='row_r_19'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">19</button>
                </div>
            </div>
        </div>
        <div class='row_r_20'>
            <div class='column_31'>
                <button class="butt_2">20</button>
            </div>
        </div>
        <div class='row_r_21'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">21</button>
                </div>
            </div>
        </div>
        <div class='row_r_22'>
            <div class='column_31'>
                <button class="butt_2">22</button>
            </div>
        </div>
        <div class='row_r_23'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">23</button>
                </div>
            </div>
        </div>
        <div class='row_r_24'>
            <div class='column_31'>
                <button class="butt_2">24</button>
            </div>
        </div>
        <div class='row_r_25'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">25</button>
                </div>
            </div>
        </div>
        <div class='row_r_26'>
            <div class='column_31'>
                <button class="butt_2">26</button>
            </div>
        </div>
        <div class='row_r_27'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">27</button>
                </div>
            </div>
        </div>
        <div class='row_r_28'>
            <div class='column_31'>
                <button class="butt_2">28</button>
            </div>
        </div>
        <div class='row_r_29'>
            <div class='column_31'>
                <div class='coordinate_1'>
                    <button class="butt_1">29</button>
                </div>
            </div>
        </div>
        <div class='row_r_30'>
            <div class='column_31'>
                <button class="butt_2">30</button>
            </div>
        </div>

    </div>

    <!--玩家動作-->
    <div class="movement p-2" style="display:none">
        <div class="card btn m-4 btn-outline-secondary walk" id="walk">
            <img src="{{ asset('img/walk_card.jpg') }}" class="card-img-top walk" alt="行走">
            <div class="card-body text-end walk">
                <p class="card-text text-start mx-2 mb-2 fw-bold walk">行走</p>
                <p class="card-text text-start mx-2 mb-1 walk">點選自己並用滑鼠拖拉到目的地</p>
            </div>
        </div>
        <div class="card btn m-4 btn-outline-secondary building" id="building">
            <img src="{{ asset('img/build_card.png') }}" class="card-img-top building" alt="建造">
            <div class="card-body text-end building">
                <p class="card-text text-start mx-2 mb-2 fw-bold building">建造</p>
                <p class="card-text text-start mx-2 mb-1 building" id="building_content"></p>
            </div>
        </div>
        <div class="card btn m-4 btn-outline-secondary trade" id="trade">
            <img src="{{ asset('img/trade_card.png') }}" class="card-img-top trade" alt="交易">
            <div class="card-body text-end trade">
                <p class="card-text text-start mx-2 mb-2 fw-bold trade">交易</p>
                <p class="card-text text-start mx-2 mb-1 trade">向GM購買坐騎或販賣特產</p>
            </div>
        </div>
        <div class="card btn m-4 btn-outline-secondary rob" id="rob">
            <img src="{{ asset('img/rob_card.png') }}" class="card-img-top rob" alt="掠奪">
            <div class="card-body text-end rob">
                <p class="card-text text-start mx-2 mb-2 fw-bold rob">掠奪</p>
                <p class="card-text text-start mx-2 mb-1 rob">花費 $3 搶奪他人領地</p>
            </div>
        </div>
    </div>

    <!--動作完成提示-->
    <div class="movement_complete" style="display:none">
        <p class="m-0" id="movement_complete_content"> </p>
        <span>
            <button id="do_movement">確認</button>
            <button id="undo_movement">取消</button>
        </span>
    </div>

    <!--移動中-->
    <div class="walking" style="display:none">
        <p class="m-0">點選角色 拖曳來移動</p>
    </div>

    <!--timer TODO -->
    <div class="timer">0</div>

    <!--GM交易商店-->
    <div class="store" style="display:none">
        <button id="close">X</button>
        <p>購買坐騎</p>
        <div class="buy">
            <button class="horse" id="horse">

            </button>
            <button class="camel" id="camel">

            </button>
        </div>
        <p class="">販賣特產</p>
        <div class="sell">
            <div class="slider">
                <input type="range" min="0" max="100" value="0" id="slider">
                <div id="selector">
                    <div class="selectBtn"></div>
                    <div id="selectValue"></div>
                </div>
                <div id="progressBar"></div>
                <button id="sell">販賣</button>
            </div>

        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/game.css') }}">
    <!-- 販賣特產 slider -->
    <link rel="stylesheet" href="{{ asset('css/game_slider.css') }}">
    <style id="style">
        /* 背景圖片隱藏 */
        .body {
            opacity: 0;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/game.js') }}"></script>
@endsection
