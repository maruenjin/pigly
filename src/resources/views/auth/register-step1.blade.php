@extends('layouts.app')

@section('content')
<h1>PiGLy</h1>
<p>新規会員登録<br><span>STEP1 アカウント情報の登録</span></p>

<form method="POST" action="{{ route('register.store') }}" novalidate>
    @csrf
    <div>
        <input type="text" name="name" placeholder="お名前" value="{{ old('name') }}">
        @error('name')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
        @error('email')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="password" name="password" placeholder="パスワード">
        @error('password')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">次に進む</button>
</form>

<p><a href="{{ route('login') }}">ログインはこちら</a>
</p>
@endsection
