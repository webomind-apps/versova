<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

   
    public function login(LoginRequest $request)
    {

        dd(Auth::guard('sales')
        ->attempt($request->only(['email', 'password'])));
        if (Auth::guard('sales')
            ->attempt($request->only(['email', 'password']))
        ) {

            $active = Auth::guard('sales')->user()->status;
            if (!$active) {
                $this->logout();
                return redirect()
                    ->back()
                    ->with('errors', 'Your account is In-active');
            }
            return redirect()
                ->route('dashboard');
        }

        return redirect()
            ->back()
            ->with('errors', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('sales')
            ->logout();

        return redirect()
            ->route('sales.login');
    }


    public function dashboard()
    {
       
        return view('dashboard');
    }
}
