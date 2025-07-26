<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateWeightTargetRequest;
use App\Models\WeightTarget;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $weightTarget = auth()->user()->weightTarget;
        return view('weights.edit_target', compact('weightTarget'));
    }

    public function update(UpdateWeightTargetRequest $request)
    {
        $user = auth()->user();

        // 既存 or 新規
        $target = $user->weightTarget ?? new WeightTarget();
        $target->user_id = $user->id; // 新規時のみ設定される
        $target->target_weight = $request->target_weight;
        $target->save();

        return redirect()->route('weight_logs.index')->with('status', '目標体重を更新しました');
    }
}


