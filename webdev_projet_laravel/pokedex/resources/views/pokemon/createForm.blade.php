<div class="min-h-screen flex items-center justify-center py-12">
    <div class="max-w-4xl w-full bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Créer un Pokémon</h2>

        <form action="{{ route('pokemon.store') }}"
              method="POST"
              class="space-y-6">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf

            <!-- Numéro -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Numéro</label>
                <input type="number"
                       name="number"
                       value="{{ old('number') }}"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('number') border-red-500 @enderror"
                       required>
                @error('number')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nom -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="mt-1 block w-full rounded-md... @error('name') border-red-500 @enderror"
                       required>
                @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- HP -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Points de vie (HP)</label>
                <input type="number"
                       name="HP"
                       value="{{ old('HP') }}"
                       min="1"
                       max="255"
                       class="mt-1 block w-full rounded-md... @error('HP') border-red-500 @enderror"
                       required>
                @error('HP')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Autres stats -->
            @foreach(['attack' => 'Attaque', 'defense' => 'Défense', 'speed' => 'Vitesse'] as $field => $label)
                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                    <input type="number"
                           name="{{ $field }}"
                           value="{{ old($field) }}"
                           min="1"
                           max="255"
                           class="mt-1 block w-full rounded-md... @error($field) border-red-500 @enderror"
                           required>
                    @error($field)
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach

            <!-- Évolutions -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Évolue depuis (ID)</label>
                    <input type="number"
                           name="evolve_from"
                           value="{{ old('evolve_from') }}"
                           class="mt-1 block w-full rounded-md... @error('evolve_from') border-red-500 @enderror">
                    @error('evolve_from')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Évolue vers (ID)</label>
                    <input type="number"
                           name="evolve_to"
                           value="{{ old('evolve_to') }}"
                           class="mt-1 block w-full rounded-md... @error('evolve_to') border-red-500 @enderror">
                    @error('evolve_to')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Types -->
            <div>
                <label class="block font-medium">Types</label>
                <div class="mt-2 space-y-1">
                    @foreach($types as $type)
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox"
                                   name="types[]"
                                   value="{{ $type->id }}"
                                   class="rounded text-indigo-600 @error('types') border-red-500 @enderror"
                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}>
                            <span class="ml-2">{{ $type->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('types')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Faiblesses -->
            <div>
                <label class="block font-medium">Faiblesses</label>
                <div class="mt-2 space-y-1">
                    @foreach($types as $type)
                        <label class="inline-flex items-center mr-4">
                            <input type="checkbox"
                                   name="weaknesses[]"
                                   value="{{ $type->id }}"
                                   class="rounded text-red-600 @error('weaknesses') border-red-500 @enderror"
                                {{ in_array($type->id, old('weaknesses', [])) ? 'checked' : '' }}>
                            <span class="ml-2">{{ $type->name }}</span>
                        </label>
                    @endforeach
                </div>
                @error('weaknesses')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Taille & Poids -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label>Taille (m)</label>
                    <input type="number"
                           step="0.1"
                           name="size"
                           value="{{ old('size') }}"
                           class="mt-1 block w-full rounded-md... @error('size') border-red-500 @enderror"
                           required>
                    @error('size')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Poids (kg)</label>
                    <input type="number"
                           step="0.1"
                           name="weight"
                           value="{{ old('weight') }}"
                           class="mt-1 block w-full rounded-md... @error('weight') border-red-500 @enderror"
                           required>
                    @error('weight')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sexe -->
            <div>
                <label class="block font-medium">Sexe</label>
                <div class="mt-2 space-x-6">
                    <label class="inline-flex items-center"><input type="radio"
                                                                   name="sex"
                                                                   value="0" {{ old('sex') == 0 ? 'checked' : '' }}>
                        Mâle</label>
                    <label class="inline-flex items-center"><input type="radio"
                                                                   name="sex"
                                                                   value="1" {{ old('sex') == 1 ? 'checked' : '' }}>
                        Femelle</label>
                    <label class="inline-flex items-center"><input type="radio"
                                                                   name="sex"
                                                                   value="2" {{ old('sex') == 2 ? 'checked' : '' }}>
                        Asexué</label>
                </div>
                @error('sex')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block font-medium">Description</label>
                <textarea name="description"
                          rows="4"
                          class="mt-1 block w-full rounded-md... @error('description') border-red-500 @enderror"
                          required>{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Boutons -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('pokemon.index') }}"
                   class="px-5 py-2 bg-gray-300 rounded hover:bg-gray-400">Annuler</a>
                <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Créer
                </button>
            </div>
        </form>
    </div>
</div>

