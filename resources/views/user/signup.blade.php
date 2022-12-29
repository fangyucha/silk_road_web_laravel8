@extends('layouts.post')

@section('title')
    註冊
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>註冊</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.signup') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">密碼</label>
                    <input type="text" id="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">註冊</button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection
