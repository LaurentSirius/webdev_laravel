<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\LoginFormRequest;
    use App\Http\Requests\StoreUserRequest;
    use App\Models\User;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Validation\ValidationException;

    class UserController extends Controller {
        // Affiche le formulaire d'inscription
        public function createUserForm() {
            return view('users.createUserForm');
        }

        // Traite l'inscription
        public function create(StoreUserRequest $request): RedirectResponse {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Optionnel : connecter automatiquement l'utilisateur après inscription
            // Auth::login($user);

            return redirect()->route('login')
                ->with('success', 'Compte créé avec succès ! Vous pouvez maintenant vous connecter.');
        }

        // Affiche le formulaire de connexion
        public function loginForm() {
            return view('users.loginForm');
        }

        public function login(LoginFormRequest $request): RedirectResponse {
            $credentials = $request->validated();

            $isAuth = Auth::guard('web')->attempt($credentials);
            if ($isAuth) {
                $request->session()->regenerate();

                return redirect()->intended(route(name: 'pokemon.list'));
            }

            return back()->withErrors([
                'email' => 'Identifiants incorrects.',
            ])->onlyInput('email');
        }
        public function logout(Request $request): RedirectResponse {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(route(name: 'users.loginForm'));
        }
    }
