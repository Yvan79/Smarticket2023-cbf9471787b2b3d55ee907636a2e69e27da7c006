<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            //'cod_usu' => ['required', 'string', 'max: 255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'dni' => ['required', 'string', 'max:255'],
            //'cod_usuario' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            $inputString = $request->input('name'),
            $words = str_word_count($inputString, 1),
            $firstLetters = array_map(function ($word) {
            return strtoupper(substr($word, 0, 1));
            }, $words),
            $firstLettersString = implode('', $firstLetters),

            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'cod_usuario' => $firstLettersString,
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->back()->with('success', 'your message,here');
        /*return redirect(RouteServiceProvider::HOME);*/
    }
}
