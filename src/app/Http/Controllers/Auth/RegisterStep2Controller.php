<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterStep2Request;
use App\Models\WeightLog;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;


class RegisterStep2Controller extends Controller
{
    public function create()
    {
        return view('auth.register-step2'); 
    }

    public function store(RegisterStep2Request $request)
    {
         $user = Auth::user();

         WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

         WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'weight' => $request->current_weight,
            
        ]);

        return redirect('/weight_logs'); 
    }

}
