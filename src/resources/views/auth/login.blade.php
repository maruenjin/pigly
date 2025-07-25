@extends('layouts.app')

@section('content')
<h1>PiGLy</h1>
<p>ログイン</p>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- メールアドレス -->
    <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
    @error('email')
        <p class="error">{{ $message }}</p>
    @enderror

    <!-- パスワード -->
    <input type="password" name="password" placeholder="パスワード">
    @error('password')
        <p class="error">{{ $message }}</p>
    @enderror

    <button type="submit">ログイン</button>
</form>

<p>
    <a href="{{ route('register.step1') }}">アカウント作成はこちら</a>
</p>
@endsection






