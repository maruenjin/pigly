@extends('layouts.weight')

@section('content')
<div class="edit-target-container">
    <div class="edit-target-card">
        <h2 class="edit-target-title">目標体重設定</h2>
        <form method="POST" action="{{ route('weight_target.update') }}">
            @csrf

            <div class="input-group">
                <input type="number" step="0.1" name="target_weight"
                       value="{{ old('target_weight', $weightTarget->target_weight ?? '') }}"
                       class="input-field" placeholder="50.0">
                <span class="unit">kg</span>
            </div>

            <div class="button-group">
                <a href="{{ route('weight_logs.index') }}" class="btn btn-gray">戻る</a>
                <button type="submit" class="btn btn-primary">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection



