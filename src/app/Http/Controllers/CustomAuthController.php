<?php

namespace App\Http\Controllers;

use App\Classes\Authentication;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('auth.login');
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customLogin(Request $request): RedirectResponse
    {
        return (new Authentication())->login($request);
    }


    /**
     * @return \Illuminate\View\View
     */
    public function registration(): View
    {
        return view('auth.registration');
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function customRegistration(Request $request): RedirectResponse
    {
        return (new Authentication())->register($request);
    }


//TODO 23.03.2022 Grzegorz Bielski: przepisać poniższą metodę, aby zwracała jeden typ
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function signOut(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}