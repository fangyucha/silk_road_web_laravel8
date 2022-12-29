@extends('layouts.post')

@section('title')
    遊戲背景
@endsection

@section('content')
    <h4>成為一位英明的領導人</h4>
    <p>玩家分別扮演一個文明，為了將你的文明推向更高的境界，領導者必須做出許多決策。引領國家與人在：政治、經濟、信仰、軍事等4方面贏過您的敵對國家，甚至影響他國文明進程</p>

    <!--補充 圖片-地圖-->

    <h4>文化交融</h4>
    <p class="blog-post-meta">NCU NLT 2021/9 prof.Shih</p>
    <p>預備for名言...</p>

    <h4>文明介紹</h4>
    <div class="d-flex p-2 bd-highlight flex-wrap">
        <div class="card m-4" style="width: 16rem;">
            <img src="{{ asset('img/constantinopolis.jpg') }}" class="card-img-top" alt="拜占庭帝國">
            <div class="card-body text-end">
                <p class="card-text text-start mx-2 mb-2 fw-bold">拜占庭帝國</p>
                <p class="card-text text-start mx-2 mb-1">區域：君士坦丁區</p>
                <p class="card-text text-start mx-2 mb-1">特殊技能：中央軍隊</p>
                <a href='{{ route('post.intro_constantinopolis') }}' class=' btn btn-outline-secondary'>更多資訊</a>
            </div>
        </div>
        <div class="card m-4" style="width: 16rem;">
            <img src="{{ asset('img/dunhuang.jpg') }}" class="card-img-top" alt="笈多王朝">
            <div class="card-body text-end">
                <p class="card-text text-start mx-2 mb-2 fw-bold">笈多王朝</p>
                <p class="card-text text-start mx-2 mb-1">區域：撒馬爾罕</p>
                <p class="card-text text-start mx-2 mb-1">特殊技能：研究方程</p>
                <a href='{{ route('post.intro_dunhuang') }}' class=' btn btn-outline-secondary'>更多資訊</a>
            </div>
        </div>
        <div class="card m-4" style="width: 16rem;">
            <img src="{{ asset('img/samarqand.jpg') }}" class="card-img-top" alt="拜占庭帝國">
            <div class="card-body text-end">
                <p class="card-text text-start mx-2 mb-2 fw-bold">阿拔斯王朝</p>
                <p class="card-text text-start mx-2 mb-1">區域：敦煌</p>
                <p class="card-text text-start mx-2 mb-1">特殊技能：以戰養戰</p>
                <a href='{{ route('post.intro_samarqand') }}' class=' btn btn-outline-secondary'>更多資訊</a>
            </div>
        </div>
        <div class="card m-4" style="width: 16rem;">
            <img src="{{ asset('img/changan.jpg') }}" class="card-img-top" alt="拜占庭帝國">
            <div class="card-body text-end">
                <p class="card-text text-start mx-2 mb-2 fw-bold">唐帝國</p>
                <p class="card-text text-start mx-2 mb-1">區域：長安</p>
                <p class="card-text text-start mx-2 mb-1">特殊技能：天可汗體系</p>
                <a href='{{ route('post.intro_changan') }}' class=' btn btn-outline-secondary'>更多資訊</a>
            </div>
        </div>
    </div>
@endsection
