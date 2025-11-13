<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreUserRequest extends FormRequest {
        public function authorize(): bool {
            return true; // PERMET LA CRÉATION
        }

        public function rules(): array {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ];
        }

        public function messages(): array {
            return [
                'required' => 'Le champ :attribute est obligatoire.',
                'email.email' => 'Veuillez entrer un email valide.',
                'email.unique' => 'Cet email est déjà utilisé.',
                'password.min' => 'Le mot de passe doit faire au moins 8 caractères.',
                'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            ];
        }
    }
