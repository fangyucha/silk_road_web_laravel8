@extends('layouts.post')

@section('title')
    進入遊戲
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <h1>金色絲路</h1>
            <a href='{{ route('game.wait') }}' class=' btn btn-outline-secondary btn-lg'>
                Entering the Mystic and Attracctive World
            </a>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/enteringGame.css') }}">
@endsection
