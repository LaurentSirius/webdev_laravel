<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pokemonListItem extends Component
{
    public string $class;
    public string $label;
    public function __construct(string $class, string $label)
    {
        $this->class = $class;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pokemon-list-item');
    }
}
