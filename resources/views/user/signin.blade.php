@extends('layouts.post')

@section('title')
    登入
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>登入</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.signin') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">密碼</label>
                    <input type="text" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">登入</button>
                {{ csrf_field() }}
            </form>
            <p>沒有帳號? <a href="{{ route('user.signup') }}">註冊</a></p>
        </div>
    </div>
@endsection
