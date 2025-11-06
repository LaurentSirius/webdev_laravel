@extends('layout.layout')

@section('content')
        <section>
            <ul class="pokemon-list">
                @foreach($pokemons as $pokemon)
                    <a href="/pokemon/{{$pokemon->id}}">
                        <x-pokemon.list.pokemon-card :pokemon="$pokemon" />
                    </a>
                @endforeach
            </ul>
        </section>
@endsection

<style>
    .pokemon-list {
        list-style: none;
        width: 75%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }
</style>
