<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;

class WeightLogController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $targetWeight = $user->weightTarget->target_weight ?? null;

        $latestLog = $user->weightLogs()->latest('date') ->first();       
         $currentWeight = $latestLog->weight ?? null;

         $difference = ($targetWeight && $currentWeight) ? $targetWeight - $currentWeight : null;

         $weightLogs = $user->weightLogs()->orderBy('date', 'desc')->paginate(8);

         return view('weights.index', compact('targetWeight', 'currentWeight', 'difference', 'weightLogs'));

    }

    public function edit($id)
    {
        $log = WeightLog::findOrFail($id);
        return view('weights.edit', compact('log'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'weight' => 'required|numeric|min:1|max:999.9',
            'calories' => 'nullable|integer',
            'exercise_time' => 'nullable|date_format:H:i',
            
        ]);

        $log = WeightLog::findOrFail($id);
        $log->update([
        'weight' => $request->weight,
        'calories' => $request->calories,
        'exercise_time' => $request->exercise_time,
    ]);

        return redirect()->route('weight_logs.index')->with('success', 'データを更新しました');
    }
}



