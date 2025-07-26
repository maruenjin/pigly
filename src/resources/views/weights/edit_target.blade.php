@extends('layouts.app')

@section('content')
<div class="container">
    <h1>目標体重の設定</h1>

    <form action="{{ route('weight_target.update') }}" method="POST">
        @csrf
        <input type="number" name="target_weight" step="0.1" value="{{ $target->target_weight ?? '' }}" placeholder="目標体重(kg)">
        @error('target_weight')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <button type="submit" class="btn btn-blue">更新</button>
        <a href="{{ route('weight_logs.index') }}" class="btn btn-gray">戻る</a>
    </form>
</div>
@endsection
