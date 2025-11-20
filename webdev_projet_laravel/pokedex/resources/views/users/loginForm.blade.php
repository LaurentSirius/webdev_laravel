<div class="bg-white p-10 rounded-xl shadow-lg text-center">
    <h1 class="text-3xl font-bold text-green-700 mb-4">Connexion</h1>
    <p class="text-lg text-gray-700">Utilisateur créé avec succès !</p>
    <a href="{{ route('pokemon.list') }}"
       class="mt-6 inline-block text-indigo-600 hover:underline">
        → Aller au Pokédex
    </a>
    <form action="{{route('users.login')}}"
          method="POST"
          class="space-y-6">
        @csrf

        <!-- Email input -->
        <div>
            <label for="email"
                   class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email"
                   name="email"
                   id="email"
                   value="{{ old('email') }}"
                   required
                   autocomplete="email"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <!-- Password input -->
        <div>
            <label for="password"
                   class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password"
                   name="password"
                   id="password"
                   required
                   autocomplete="current-password"
                   class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Bouton connexion -->
        <button type="submit"
                class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg transition duration-200 shadow-md">
            Se connecter
        </button>

        <!-- Créer un nouvel utilisateur -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Pas encore de compte ?
                <a href="{{route('users.create-user')}}"
                   class="font-medium text-indigo-600 hover:text-indigo-500 underline">
                    Créer un compte
                </a>
            </p>
        </div>

        <!-- Lien pour afficher la liste sans utilisateur / TODO -->
        <div class="mt-8 text-center">
            <a href="{{ route('pokemon.list') }}"
               class="text-sm text-gray-500 hover:text-gray-700 underline">
                → Accéder au Pokédex sans se connecter
            </a>
        </div>
    </form>
</div>
