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
        <form method="GET" action="{{ route('weight_logs.index') }}" class="search-form">
            <input type="date" name="from" value="{{ request('from') }}">
            <input type="date" name="to" value="{{ request('to') }}">
            <button type="submit" class="btn btn-gray">検索</button>
        </form>
        
        <button class="btn btn-primary">データ追加</button>
    </div>

    
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
@endsection





