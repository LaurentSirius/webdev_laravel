@extends('layout.layout')

@section('content')
    <section>
       <x-pokemon.details.evolution-navigation />
        <h1>{{ $pokemon->name }}</h1>

        <div class="left">
            <img src="https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/detail/001.png" alt="pokemon" />


        </div>
        <div class="right">
            @if(!empty($pokemon->description))
                <div class="pokemon-details-description-card">
                    <p>{{ $pokemon->description->description }}</p>
                    <div class="pokemon-details-description-card--stats">
                        <p>
                            <span>Taille</span>
                            <span>{{ $pokemon->description->size }}</span>
                        </p>
                        <p>
                            <span>Poids</span>
                            <span>{{ $pokemon->description->weight }}</span>
                        </p>
                        <p>
                            <span>Sexe</span>
                            <span>{{ $pokemon->description->sex }}</span>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>


@endsection


<style>
    .pokemon-details-description-card--stats {
        background-color: #30a7d7;
        color: white;
        border-radius: 7px;
    }
</style>
