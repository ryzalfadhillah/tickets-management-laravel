<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return View('auth.login');
    }

    public function login(Request $request)
    {
        $apiRequest = Request::create(url('/api/login'), 'POST');
        $response = app()->make('router')->dispatch($apiRequest);

        $data = json_decode($response->getContent());

        if (isset($data->status) && $data->status) {
            $token = $data->data->token;
            $request->session()->put('LoginSession', $token);
            return Redirect('/')->with('success', 'Login Berhasil!');
        } else {
            return Redirect('/login')->with('error', 'Email atau Password salah!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect('/login')->with('logout_success', 'Logout Berhasil!');
    }
}
