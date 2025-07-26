<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;

class WeightTargetController extends Controller
{
    public function edit()
    {
        $target = Auth::user()->weightTarget;
        return view('weights.edit_target', compact('target'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'target_weight' => 'required|numeric|min:1|max:999.9',
        ]);

        $user = Auth::user();

        $user->weightTarget()->updateOrCreate(
            ['user_id' => $user->id],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('weight_logs.index')->with('success', '目標体重を更新しました');
    }
}
