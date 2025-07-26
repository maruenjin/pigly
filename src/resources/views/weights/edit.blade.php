@extends('layouts.weight')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card edit-card p-4">
        <h1 class="edit-title  mb-4">Weight Log</h1>

        <form method="POST" action="{{ route('weight_logs.update', $weightLog->id) }}">
            @csrf

            <!-- 日付 -->
            <div class="mb-3">
                <label class="form-label">日付</label>
                <input type="date" name="date" class="form-control"
                       value="{{ old('date', $weightLog->date) }}">
                @error('date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 体重 -->
            <div class="mb-3">
                <label class="form-label">体重</label>
                <div class="input-group">
                    <input type="number" step="0.1" name="weight" class="form-control"
                           placeholder="50.0" value="{{ old('weight', $weightLog->weight) }}">
                    <span class="input-group-text">kg</span>
                </div>
                @error('weight')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 摂取カロリー -->
            <div class="mb-3">
                <label class="form-label">摂取カロリー</label>
                <div class="input-group">
                    <input type="number" name="calories" class="form-control"
                           placeholder="1200" value="{{ old('calories', $weightLog->calories) }}">
                    <span class="input-group-text">cal</span>
                </div>
                @error('calories')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 運動時間 -->
            <div class="mb-3">
                <label class="form-label">運動時間</label>
                <input type="time" name="exercise_time" class="form-control"
                       value="{{ old('exercise_time', $weightLog->exercise_time) }}">
                <small class="form-text text-muted">00(時間):00(分)形式で入力してください</small>
                @error('exercise_time')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- 運動内容 -->
            <div class="mb-4">
                <label class="form-label">運動内容</label>
                <textarea name="exercise_detail" class="form-control"
                          placeholder="運動内容を追加">{{ old('exercise_detail', $weightLog->exercise_detail) }}</textarea>
                @error('exercise_detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- ボタン -->
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('weight_logs.index') }}" class="btn btn-gray">戻る</a>
                <button type="submit" class="btn btn-gradient">更新</button>
            </div>
        </form>

        <!-- ゴミ箱 -->
        <div class="text-end mt-3">
            <form method="POST" action="{{ route('weight_logs.delete', $weightLog->id) }}">
                @csrf
                <button type="submit" class="btn-trash">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection



