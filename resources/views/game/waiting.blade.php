@extends('layouts.post')

@section('title')
    金色絲路
@endsection

@section('content')
    <div>
        <h1>等待玩家進入房間...</h1>
    </div>
    <div class="d-flex p-2 bd-highlight flex-wrap">
        <div class="card m-4" style="width: 10rem;" id="userNum_1">
            <img src="{{ asset('img/player_constan.png') }}" class="card-img-top" alt="拜占庭帝國">
            <div class="card-body">
                <p class="card-text text-center mx-2 mb-2 fw-bold">拜占庭帝國</p>
            </div>
        </div>
        <div class="card m-4" style="width: 10rem;display:none;" id="userNum_2">
            <img src="{{ asset('img/player_smar.png') }}" class="card-img-top" alt="阿拉伯帝國">
            <div class="card-body text-end">
                <p class="card-text text-center mx-2 mb-2 fw-bold">阿拉伯帝國</p>
            </div>
        </div>
        <div class="card m-4" style="width: 10rem;display:none;" id="userNum_3">
            <img src="{{ asset('img/player_dun.png') }}" class="card-img-top" alt="笈多王朝">
            <div class="card-body text-end">
                <p class="card-text text-center mx-2 mb-2 fw-bold">笈多王朝</p>
            </div>
        </div>
        <div class="card m-4" style="width: 10rem;display:none;" id="userNum_4">
            <img src="{{ asset('img/player_chang.png') }}" class="card-img-top" alt="唐帝國">
            <div class="card-body text-end">
                <p class="card-text text-center mx-2 mb-2 fw-bold">唐帝國</p>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/wait.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('js/room.js') }}"></script>
@endsection
