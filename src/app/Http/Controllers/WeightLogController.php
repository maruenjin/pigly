<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\UpdateWeightLogRequest;
use App\Models\WeightLog;
use Illuminate\Http\Request;

class WeightLogController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $targetWeight = $user->weightTarget->target_weight ?? null;
        $latestLog = $user->weightLogs()->latest('date')->first();
        $currentWeight = $latestLog->weight ?? null;
        $difference = ($targetWeight && $currentWeight) ? $targetWeight - $currentWeight : null;

        $weightLogs = $user->weightLogs()->orderBy('date', 'desc')->paginate(8);

        return view('weights.index', compact('targetWeight', 'currentWeight', 'difference', 'weightLogs'));
    }

    public function edit($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        return view('weights.edit', compact('weightLog'));
    }

    public function update(UpdateWeightLogRequest $request, $id)
    {
        $weightLog = WeightLog::findOrFail($id);

        $weightLog->update([
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_detail' => $request->exercise_detail,
        ]);

        return redirect()->route('weight_logs.index')->with('status', '更新しました');
    }

    public function store(StoreWeightLogRequest $request)
    {
        WeightLog::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'weight' => $request->weight,
            'calories' => $request->calories,
            'exercise_time' => $request->exercise_time,
            'exercise_detail' => $request->exercise_detail,
        ]);

        return redirect()->route('weight_logs.index')->with('success', 'データを追加しました');
    }

    public function destroy($id)
    {
        $weightLog = WeightLog::findOrFail($id);
        $weightLog->delete();

        return redirect()->route('weight_logs.index')->with('status', 'データを削除しました');
    }

    public function search(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $query = WeightLog::query();

        if ($start && $end) {
            $query->whereBetween('date', [$start, $end]);
        } elseif ($start) {
            $query->where('date', '>=', $start);
        } elseif ($end) {
            $query->where('date', '<=', $end);
        }

        $weightLogs = $query->orderBy('date', 'desc')->paginate(8);

        return view('weights.index', [
            'weightLogs' => $weightLogs,
            'start' => $start,
            'end' => $end,
            'searchCount' => $weightLogs->total(),
            'targetWeight' => auth()->user()->weightTarget->target_weight ?? null,
            'currentWeight' => $weightLogs->first()->weight ?? null,
            'difference' => isset($start) ? null : (
                (auth()->user()->weightTarget->target_weight ?? null) && ($weightLogs->first()->weight ?? null)
                    ? ($weightLogs->first()->weight - auth()->user()->weightTarget->target_weight)
                    : null
            ),
        ]);
    }
}




