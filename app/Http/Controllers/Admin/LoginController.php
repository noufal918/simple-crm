<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Index
    public function index()
    {
        return view('admin.auth.login');
    }

    // Login Attempt
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (Auth::attempt($credentials, $request->remember)) {
                // Authentication passed...
                return redirect()->route('admin.home'); // Redirect to the intended URL or a dashboard route
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('login')
            ->withInput($request->only('email'))
            ->withErrors(['email' => 'These credentials do not match our records.']);
    }
}
