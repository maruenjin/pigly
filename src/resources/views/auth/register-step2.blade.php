@extends('layouts.app')

@section('content')
<h1>新規</h1>
<p>STEP2 体重を入力してください</p>

<form method="POST" action="/weight/create">
    @csrf
    <div>
        <input type="number" name="current_weight" placeholder="現在の体重(kg)" value="{{ old('current_weight') }}">
        @error('current_weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="number" name="goal_weight" placeholder="目標の体重(kg)" value="{{ old('goal_weight') }}">
        @error('goal_weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">登録</button>
</form>
@endsection
