<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
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
        $request->validate(['name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required|min:6']);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }


    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function create(array $data): User
    {
        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }


    /**
     * @return \Illuminate\Routing\Redirector
     */
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