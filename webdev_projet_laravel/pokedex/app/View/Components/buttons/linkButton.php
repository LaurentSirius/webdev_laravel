<?php

namespace App\View\Components\buttons;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class linkButton extends Component
{
    public string $path;
    public string $label;

    public function __construct(string $path, string $label)
    {
        $this->path = $path;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.buttons.link-button');
    }
}
