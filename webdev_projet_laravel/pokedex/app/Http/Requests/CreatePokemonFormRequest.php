<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class CreatePokemonFormRequest extends FormRequest {
        /**
         * Determine if the user is authorized to make this request.
         */
        public function authorize(): bool {
            return true;
        }

        /**
         * Get the validation rules that apply to the request.
         *
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array {
            return [
                "name" => "required|string|min:3",
                "number" => "required|integer|unique:pokemon,number",
                "hp" => "required|integer",
                "attack" => "required|integer",
                "defense" => "required|integer",
                "speed" => "required|integer",
                "evolve_from" => "nullable|integer|exists:pokemon,id",
                "evolve_to" => "nullable|integer|exists:pokemon,id",
                "types" => "required|array",
                "types.*" => "integer|min:1|exists:types,id",
                "weaknesses" => "required|array",
                "weaknesses.*" => "integer|min:1|exists:types,id",
                'size' => 'required|numeric',
                'weight' => 'required|numeric',
                "sex" => "required|integer|in:0,1,2",
                "description" => "required|string",
            ];
        }

        // Message d'erreur
        public function messages(): array {
            return [
                'required' => 'Le champ :attribute est obligatoire',
                'integer' => 'Le champs doit être un nombre entier',
                'min' => 'Le champs doit faire au moins :min',
                'max' => 'Le champs doit faire au maximum :max',
                'array' => 'Le champs doit être un tableau',
                'unique' => 'Le champs existe déja en DB',
                'decimal' => 'Le champs doit avoir au moins :decimal chiffres',
            ];
        }
    }
