@extends('layouts.post')

@section('title')
    遊戲開發介紹
@endsection

@section('content')
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">AR體驗</strong>
                    <h3 class="mb-0">絲路Game1.7</h3>
                    <div class="mb-1 text-muted">2021/11</div>
                    <p class="card-text mb-auto">完整版的地圖、數十座真實世界存在的城市、4大富麗璀璨的東西文明、面對面向對手衷心讚嘆或嘲諷</p>
                    <a href="#" class="stretched-link">王欣茹</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">實體版</text>
                    </svg>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">Web Game</strong>
                    <h3 class="mb-0">絲路Game2.4</h3>
                    <div class="mb-1 text-muted">2022/6</div>
                    <p class="mb-auto">縮小版的地圖、一樣豐富的策略性與文化底蘊、線上遊戲隨時隨地與好朋友們較量的快感</p>
                    <a href="#" class="stretched-link">胡家郡</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img"
                        aria-label="Placeholder: صورة مصغرة" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em">數位版</text>
                    </svg>

                </div>
            </div>
        </div>
    </div>
@endsection
