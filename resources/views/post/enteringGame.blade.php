@extends('layouts.post')

@section('title')
    進入遊戲
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <h1>絲路––華戎道</h1>
            <h1>數位版桌遊<h1>
            <a href='{{ route('game.wait') }}' class=' btn btn-outline-secondary btn-lg'>
                Entering the Mystic and Attracctive World
            </a>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/enteringGame.css') }}">
@endsection
