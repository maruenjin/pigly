<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function create()
    {
        return view('auth.register-step1');
    }

    public function store(RegisterRequest $request)
    {  
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
      auth()->login($user);
      
      return redirect('/register/step2');
    }
}
