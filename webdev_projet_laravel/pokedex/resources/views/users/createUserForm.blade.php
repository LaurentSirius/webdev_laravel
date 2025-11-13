<div class="w-full max-w-md">
    <div class="bg-white shadow-2xl rounded-xl p-8">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-8">Créer un compte</h2>

        <!-- Erreurs de validation -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-300 text-red-700 rounded-lg">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.create') }}"
              method="POST"
              class="space-y-6">
            @csrf

            <!-- Nom -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror"
                    placeholder="Jean Dupont"
                    required>
                @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror"
                    placeholder="jean@example.com"
                    required>
                @error('email')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Mot de passe -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror"
                    placeholder="Min. 8 caractères"
                    required>
                @error('password')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirmation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirmer</label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-3 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition transform hover:scale-105">
                Créer mon compte
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            Déjà un compte ?
            <a href="{{ route('login') }}"
               class="text-indigo-600 hover:underline font-medium">Se connecter</a>
        </p>
    </div>
</div>
