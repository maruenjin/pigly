@extends('layouts.app')

@section('content')
<h1>データ編集</h1>
<form action="{{ route('weight_logs.update', $log->id) }}" method="POST">
    @csrf
    <div>
        <label>体重</label>
        <input type="number" name="weight" value="{{ $log->weight }}" step="0.1">
        @error('weight') <p style="color:red;">{{ $message }}</p> @enderror
    </div>

    <div>
        <label>摂取カロリー</label>
        <input type="number" name="calories" value="{{ $log->calories }}">
    </div>

    <div>
        <label>運動時間</label>
        <input type="time" name="exercise_time" value="{{ $log->exercise_time }}">
    </div>

   
    <button type="submit">更新</button>
    <a href="{{ route('weight_logs.index') }}">戻る</a>
</form>
@endsection
