<div class="pokemon-list-card">
    <img src="https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/detail/001.png" alt="pokemon" />
    <div>
        <p class="number">N° {{ str_pad($pokemon->number, 4, 0, STR_PAD_LEFT) }}</p>
        <p class="name">{{ $pokemon->name  }}</p>
        <ul class="pokemon-list-card--types">
            @foreach($pokemon->types as $type)
                <x-pokemon.type-tag :name="$type->name" :color="$type->color_code" />
            @endforeach
        </ul>
    </div>
</div>


<style>
    .pokemon-list-card {
        width: 200px;
    }

    .pokemon-list-card:hover {
        cursor: pointer;
    }

    .pokemon-list-card img {
        width: 200px;
        height: 200px;
        background-color: lightgray;
        border-radius: 5px;
    }

    .pokemon-list-card div {
        padding: 5px 10px;
    }

    .pokemon-list-card div .number {
        color: #6c757d;
        font-size: 12px;
        font-weight: bold;
    }

    .pokemon-list-card div .name {
        color: #2c3e50;
        font-size: 24px;
        font-weight: bold;
    }

    .pokemon-list-card--types {
        list-style: none;
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }
</style>
