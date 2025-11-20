@extends('layout.layout')

@section('content')
        <section>
            <ul class="pokemon-list">
                @foreach($pokemon as $poke)
                    <a href="/pokemon/{{$poke->id}}">
                        <x-pokemon.list.pokemon-card :pokemon="$poke" />
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
