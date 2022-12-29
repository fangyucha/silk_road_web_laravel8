@extends('layouts.master')

@section('content')
    <div class="slider">
        <input type="range" min="0" max="100" value="50" id="slider">
        <div id="selector">
            <div class="selectBtn"></div>
            <div id="selectValue"></div>
        </div>
        <div id="progressBar"></div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <style>
        /* 背景圖片隱藏 */
        .body {
            opacity: 0;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{ asset('js/demo.js') }}"></script>
@endsection
