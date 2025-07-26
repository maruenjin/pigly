@extends('layouts.weight')

@section('content')
<div class="container">
    
    

    
    <div class="summary-cards">
        <div class="card">
            <h3>目標体重</h3>
            <p>{{ $targetWeight ? number_format($targetWeight, 1) : '--' }} kg</p>
        </div>
        <div class="card">
            <h3>目標まで</h3>
            <p>{{ $difference ? number_format($difference, 1) : '--' }} kg</p>
        </div>
        <div class="card">
            <h3>最新体重</h3>
            <p>{{ $currentWeight ? number_format($currentWeight, 1) : '--' }} kg</p>
        </div>
    </div>

   
    <div class="search-bar">
        <form method="GET" action="{{ route('weight_logs.search') }}" class="search-form">
            <input type="date" name="start_date" value="{{ request('start_date') }}">
            <input type="date" name="end_date" value="{{ request('end_date') }}">
            <button type="submit" class="btn btn-primary">検索</button>

            @if(request('start_date') || request('end_date'))
                <a href="{{ route('weight_logs.index') }}" class="btn btn-gray">リセット</a>
            @endif
        </form>

        <!-- データ追加ボタン（モーダル用） -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
    データ追加
</button>
    </div>

     @if(isset($searchCount))
        <p style="margin-top:10px;">
            {{ $start ?? '-' }} ～ {{ $end ?? '-' }} の検索結果 {{ $searchCount }} 件
        </p>
    @endif

    
    <div class="logs">
        <table>
            <thead>
                <tr>
                    <th>日付</th>
                    <th>体重</th>
                    <th>摂取カロリー</th>
                    <th>運動時間</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($weightLogs as $log)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($log->date)->format('Y/m/d') }}</td>
                        <td>{{ number_format($log->weight, 1) }}kg</td>
                        <td>{{ $log->calories ?? '-' }}cal</td>
                        <td>{{ $log->exercise_time ?? '-' }}</td>
                        <td class="edit-column">
                            <a href="{{ route('weight_logs.edit', $log->id) }}"
                             <i class="fas fa-pencil-alt" ></i></a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">データがありません</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- ページネーション -->
    <div class="pagination">
        {{ $weightLogs->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
                <h5 class="modal-title" id="addDataModalLabel">Weight Logを追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="閉じる"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('weight_logs.store') }}">
                    @csrf
<div class="mb-3">
    <label class="form-label">日付 <span class="badge-required">必須</span></label>
    <input type="date" name="date" class="form-control custom-date-input" value="{{ old('date', date('Y-m-d')) }}">
    @error('date')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">体重 <span class="badge-required">必須</span></label>
    <div class="input-group">
        <input type="number" step="0.1" name="weight" class="form-control"  placeholder="50.0" value="{{ old('weight') }}">
        <span class="input-group-text">kg</span>
    </div>
    @error('weight')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">摂取カロリー <span class="badge-required">必須</span></label>
    <div class="input-group">
        <input type="number" name="calories" class="form-control" placeholder="1200" value="{{ old('calories') }}">
        <span class="input-group-text">cal</span>
    </div>
    @error('calories')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="mb-3">
    <label class="form-label">運動時間 <span class="badge-required">必須</span></label>
    <input type="time" name="exercise_time" class="form-control"
           value="{{ old('exercise_time', '00:00') }}">
    <small class="form-text text-muted">00(時間):00(分)形式で入力してください</small>
    @error('exercise_time')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">運動内容</label>
    <textarea name="exercise_detail" class="form-control"  placeholder="運動内容を追加">{{ old('exercise_detail') }}</textarea>
    @error('exercise_detail')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-gray" data-bs-dismiss="modal">戻る</button>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
@if ($errors->any())
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var addDataModal = new bootstrap.Modal(document.getElementById('addDataModal'));
        addDataModal.show();
    });
</script>
@endif

@endsection





