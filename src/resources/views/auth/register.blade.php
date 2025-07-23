@extends('layouts.app')

@section('content')
<h1>PiGLy</h1>
<p>新規会員登録<br><span>STEP1 アカウント情報の登録</span></p>

<form>
    <input type="text" placeholder="お名前">
    <input type="email" placeholder="メールアドレス">
    <input type="password" placeholder="パスワード">
    <button type="submit">次に進む</button>
</form>

<p><a href="/login">ログインはこちら</a></p>
@endsection
