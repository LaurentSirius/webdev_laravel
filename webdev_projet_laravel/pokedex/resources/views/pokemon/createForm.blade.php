<div>
    <form action="{{route('pokemon.create')}}"
          method="POST">
        @csrf
        <div>
            <label for="number">Numéro</label>
            <input type="number"
                   name="number"
                   value="{{old('number')}}">
            @error('number')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="name">Nom</label>
            <input type="text"
                   name="name"
                   value="{{old('name')}}">
            @error('name')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="hp">Points de vie</label>
            <input type="number"
                   name="hp"
                   value="{{old('hp')}}">
            @error('hp')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="attack">Attaque</label>
            <input type="number"
                   name="attack"
                   value="{{old('attack')}}">
            @error('attack')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="defense">Défense</label>
            <input type="number"
                   name="defense"
                   value="{{old('defense')}}">
            @error('defense')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="speed">Vitesse</label>
            <input type="number"
                   name="speed"
                   value="{{old('speed')}}">
            @error('speed')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="evolve_from">Précédente évolution</label>
            <input type="number"
                   name="evolve_from"
                   value="{{old('evolve_from')}}">
            @error('evolve_from')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="evolve_to">Prochaine évolution</label>
            <input type="number"
                   name="evolve_to"
                   value="{{old('evolve_to')}}">
            @error('evolve_to')
            <div class="error">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="types">Types</label>
            @foreach($types as $type)
                <label>
                    <input type="checkbox"
                           name="types[]"
                           value="{{$type->id}}"
                        {{in_array($type->id, old('types', [])) ? 'checked' : ''}}>
                    {{$type->name}}
                </label>
            @endforeach
            @error('types') <span class="error">{{$message}}</span> @enderror
        </div>

        <button type="submit">Envoyer</button>
    </form>
</div>
