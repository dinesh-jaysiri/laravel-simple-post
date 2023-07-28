<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $incomingFields = $request->validate([
            'name' => ['required', "min:3", "max:10", Rule::unique('users', "name")],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {

        $incomingFields = $request->validate(
            [
                'name' => 'required',
                'password' => 'required'
            ]
        );

        if (auth()->attempt(['password' => $incomingFields['password'], 'name' => $incomingFields['name']])) {

            $request->session()->regenerate();
        }

        return redirect('/');

    }
}