@extends('layouts.app')

@section('content')
<h1 class="text-center text-3xl font-bold text-pink-500 mb-4">PiGLy</h1>
<p class="text-center mb-6">新規会員登録<br><span class="text-sm text-gray-500">STEP2 体重データの入力</span></p>

<form method="POST" action="#">
    @csrf
    <div class="flex items-center mb-4">
        <input type="number" placeholder="現在の体重を入力" class="border rounded w-full p-2" />
        <span class="ml-2">kg</span>
    </div>
    <div class="flex items-center mb-4">
        <input type="number" placeholder="目標の体重を入力" class="border rounded w-full p-2" />
        <span class="ml-2">kg</span>
    </div>
    <button type="submit" class="w-full bg-gradient-to-r from-pink-400 to-purple-400 text-white font-bold py-2 rounded">アカウント作成</button>
</form>
@endsection
