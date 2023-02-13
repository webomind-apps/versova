<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

   
    public function login(LoginRequest $request)
    {

        // dd(Auth::guard('customer')
        // ->attempt($request->only(['email', 'password'])));
        if (Auth::guard('customer')
            ->attempt($request->only(['email', 'password']))
        ) {
   
            $active = Auth::guard('customer')->user()->status;
            if (!$active) {
                $this->logout();
                return redirect()
                    ->back()
                    ->with('errors', 'Your account is In-active');
            }
            // dd('hi');
            return redirect()
                ->route('dashboard');
        }

        return redirect()
            ->back()
            ->with('errors', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('customer')
            ->logout();

        return redirect()
            ->route('customer.login');
    }


    public function dashboard()
    {
       dd('hi');
        return view('dashboard');
    }
}
