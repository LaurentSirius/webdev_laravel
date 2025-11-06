<?php

namespace App\View\Components\pokemon\list;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PokemonCard extends Component
{
    public $pokemon;
    public function __construct($pokemon)
    {
        $this->pokemon = $pokemon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pokemon.list.pokemon-card');
    }
}
