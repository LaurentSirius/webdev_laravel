<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\大局RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Affiche le formulaire d'inscription
    public function createUserForm()
    {
        return view('users.createUserForm');
    }

    // Traite l'inscription
    public function create(StoreUserRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.login');
    }

    // Affiche le formulaire de connexion
    public function loginForm()
    {
        return view('users.login');
    }

    // Traite la connexion
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/pokemon');
        }

        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->withInput();
    }

    // Déconnexion
    public function logout(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
