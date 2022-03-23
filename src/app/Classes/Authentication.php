<?php

namespace App\Classes;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Authentication
{
    /**
     * @var array|string[]
     */
    protected array $loginValidationRules =
        [
            'email' => 'required',
            'password' => 'required',
        ];

    /**
     * @var array|string[]
     */
    protected array $registerValidationRules =
        [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $template = 'login';
        $message = 'Podaj poprawne dane logowania';

        $request->validate($this->loginValidationRules);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $template = 'dashboard';
            $message = 'Zostałeś pomyślnie zalogowany';
        }

        return redirect($template)->withSuccess($message);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request): RedirectResponse
    {
        $template = 'dashboard';
        $message = 'Rejestracja nieudana';

        $request->validate($this->registerValidationRules);

        $user = $this->createUser($request->all());
        if (isset($user->id)) {
            $message = "Rejestracja udana";
        }

        return redirect($template)->withSuccess($message);
    }


    /**
     * @param array $data
     * @return \App\Models\User
     */
    public function createUser(array $data): User
    {
        return User::create(
            [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );
    }
}