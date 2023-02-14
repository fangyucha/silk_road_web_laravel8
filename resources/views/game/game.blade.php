@extends('layouts.master')

@section('title')
    金色絲路
@endsection

@section('content')
    <!--左側滑出邊欄-->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <!--<a href='{{ route('post.intro_changan') }}' class=' btn btn-outline-secondary'>更多資訊</a>-->
        <a href="#" onclick="">使用者</a>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn1'>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_1'>
                <div class="box">
                    <div class='Hexagon_g walked'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn2'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn3'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container" id='btn4'>
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
                        <button class="butt_c" data-role="drag-drop-container" id='btn5'>
                            <img src="{{ asset('img/player_constan.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_0" class="player">
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn6'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn7'>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn8'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn9'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn10'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn11'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_1'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn12'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn13'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn14'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn15'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn16'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn17'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn18'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn19'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn20'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn21'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn22'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn23'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_2'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn24'></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_3 -->
        <div class='row_1'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn25'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_3'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn26'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn27'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn28'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn29'></button>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn30'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn31'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn32'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn33'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn34'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_3'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn35'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn36'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn37'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn38'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_4'>
                <div class="box">
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn39'>
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
                        <button class="butt_t" data-role="drag-drop-container" id='btn40'>
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
                        <button class='butt_h' data-role="drag-drop-container" id='btn41'>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn42'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn43'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn44'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn45'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_4'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn46'></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_5 -->
        <div class='row_1'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn47'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_5'>
                <div class="box">
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn48'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn49'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn50'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn51'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn52'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn53'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn54'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn55'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn56'></button>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn57'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_5'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn58'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn59'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn60'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn61'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn62'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn63'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn64'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn65'>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn66'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn67'>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn68'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container" id='btn69'>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn70'></button>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn71'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_6'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn72'></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_7 -->
        <div class='row_1'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn73'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn74'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn75'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn76'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn77'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn78'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn79'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn80'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn81'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn82'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn83'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn84'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_7'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn85'></button>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn86'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn87'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn88'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn89'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn90'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn91'></button>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn92'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn93'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_8'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn94'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn95'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn96'></button>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn97'></button>
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
                        <button class="butt_t" data-role="drag-drop-container" id='btn98'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn99'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn100'></button>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn101'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_9'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class="butt_s" data-role="drag-drop-container" id='btn102'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn103'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn104'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn105'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn106'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn107'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn108'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn109'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn110'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_10'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn111'></button>
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
                        <button class="butt_s" data-role="drag-drop-container" id='btn112'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn113'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn114'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn115'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn116'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn117'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn118'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn119'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn120'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn121'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_11'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn122'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn123'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn124'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn125'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn126'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container" id='btn127'>
                            <img src="{{ asset('img/player_smar.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_1" class="player">
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn128'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn129'>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn130'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_12'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn131'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn132'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn133'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn134'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn135'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn136'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn137'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn138'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn139'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn140'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_13'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn141'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn142'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn143'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn144'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn145'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn146'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn147'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn148'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn149'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn150'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_14'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn151'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn152'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn153'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn154'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn155'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn156'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn157'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn158'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn159'>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn160'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn161'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_15'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn162'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn163'></button>
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
                        <button class="butt_t" data-role="drag-drop-container" id='btn164'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn165'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn166'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn167'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn168'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn169'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn170'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn171'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn172'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn173'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_16'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn174'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn175'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn176'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn177'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn178'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn179'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn180'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn181'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn182'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn183'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container" id='btn184'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn185'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn186'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_27'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn187'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_29'>
            <div class='column_17'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn188'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn189'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn190'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn191'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn192'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn193'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn194'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn195'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn196'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn197'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container" id='btn198'>
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
                        <button class="butt_m" data-role="drag-drop-container" id='btn199'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_18'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn200'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn201'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn202'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn203'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn204'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn205'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn206'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn207'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn208'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn209'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn210'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn211'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_19'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn212'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn213'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn214'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn215'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn216'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn217'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn218'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn219'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container" id='btn220'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn221'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn222'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_20'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn223'></button>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn224'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn225'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn226'>
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
                        <button class="butt_t" data-role="drag-drop-container" id='btn227'>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn228'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn229'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn230'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn231'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn232'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn233'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_21'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn234'></button>
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
                        <button class='butt_s' data-role="drag-drop-container" id='btn235'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn236'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn237'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container" id='btn238'>
                            <img src="{{ asset('img/player_dun.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_2" class="player">
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn239'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn240'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn241'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn242'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn243'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn244'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_22'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn245'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn246'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn247'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn248'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn249'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn250'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn251'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn252'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn253'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn254'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn255'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn256'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn257'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_23'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn258'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn259'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn260'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn261'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn262'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn263'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn264'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn265'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn266'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn267'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container" id='btn268'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_24'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn269'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_26'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn270'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn271'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_24'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn272'></button>
                    </div>
                </div>
            </div>
        </div>
        <!--column_25 -->
        <div class='row_1'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn273'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn274'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn275'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn276'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn278'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn279'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn280'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn281'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn282'>
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn283'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container" id='btn284'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn285'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_25'>
            <div class='column_25'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn286'>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn287'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn288'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn289'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn290'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn291'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn292'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn293'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn294'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn295'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_18'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn296'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn297'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn298'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn299'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_26'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn300'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn301'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn302'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn303'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn304'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn305'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_11'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn306'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_c'>
                        <button class="butt_c" data-role="drag-drop-container" id='btn307'>
                            <img src="{{ asset('img/player_chang.png') }}" alt="constan" data-role="player"
                                draggable="true" id="player_3" class="player">
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
                        <button class='butt_m' data-role="drag-drop-container" id='btn308'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn309'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn310'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn311'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_23'>
            <div class='column_27'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn312'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn313'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn314'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn315'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn316'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn317'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_10'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn318'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_12'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn319'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class='butt_m' data-role="drag-drop-container" id='btn320'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_h'>
                        <button class='butt_h' data-role="drag-drop-container" id='btn321'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn322'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn323'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_22'>
            <div class='column_28'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn324'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn325'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_3'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn326'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_5'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn327'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_7'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_s'>
                        <button class='butt_s' data-role="drag-drop-container" id='btn328'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_9'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn329'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn330'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_13'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn331'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_15'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn332'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_17'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn333'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_19'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn334'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_21'>
            <div class='column_29'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn335'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn336'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_4'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn337'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_6'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn338'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_8'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn339'></button>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn340'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_14'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn341'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_16'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_t'>
                        <button class="butt_t" data-role="drag-drop-container" id='btn342'>
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
                        <button class='butt_g' data-role="drag-drop-container" id='btn343'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_20'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class='butt_g' data-role="drag-drop-container" id='btn344'></button>
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
                        <button class="butt_g" data-role="drag-drop-container" id='btn345'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_28'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_g'>
                        <button class="butt_g" data-role="drag-drop-container" id='btn346'></button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row_30'>
            <div class='column_30'>
                <div class='box'>
                    <div class='Hexagon_m'>
                        <button class="butt_m" data-role="drag-drop-container" id='btn347'></button>
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
        <div class="card btn m-4 btn-outline-secondary cancel" id="cancel">
            <img src="{{ asset('img/cancel.png') }}" class="card-img-top cancel" alt="行走">
            <div class="card-body text-end cancel">
                <p class="card-text text-start mx-2 mb-2 fw-bold cancel">結束</p>
                <p class="card-text text-start mx-2 mb-1 cancel">不做任何動作結束此回合</p>
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

    <div class="character" style="display:none">
        {{ Session::get('character') }}
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
    <script src="{{ asset('js/rule.js') }}"></script>
@endsection
