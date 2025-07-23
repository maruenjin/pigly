@extends('layouts.app')

@section('content')
<h1 class="text-center text-3xl font-bold text-pink-500 mb-4">PiGLy</h1>
<p class="text-center mb-6">ログイン</p>

<form method="POST" action="#">
    @csrf
    <input type="email" placeholder="メールアドレス" class="border rounded w-full mb-4 p-2" />
    <input type="password" placeholder="パスワード" class="border rounded w-full mb-4 p-2" />
    <button type="submit" class="w-full bg-gradient-to-r from-pink-400 to-purple-400 text-white font-bold py-2 rounded">ログイン</button>
</form>

<p class="text-center mt-4">
    <a href="/register" class="text-blue-500">アカウント作成はこちら</a>
</p>
@endsection
