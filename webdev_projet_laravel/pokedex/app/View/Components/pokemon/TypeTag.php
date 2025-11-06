<?php

namespace App\View\Components\pokemon;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TypeTag extends Component
{
    public string $name;
    public string $color;
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pokemon.type-tag');
    }
}
