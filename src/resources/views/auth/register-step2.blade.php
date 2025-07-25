@extends('layouts.app')

@section('content')
<h1>PiGLy</h1>
<p>新規会員登録<br><span>STEP2 体重データの入力</span></p>

<form method="POST" action="{{ route('register.step2.store') }}" novalidate>

    @csrf
    <div>
        <input type="number" name="current_weight" placeholder="現在の体重(kg)" value="{{ old('current_weight') }}">
        @error('current_weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <input type="number" name="target_weight" placeholder="目標の体重(kg)" value="{{ old('target_weight') }}">
        @error('target_weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">アカウントの作成</button>
</form>
@endsection
