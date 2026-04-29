<?php

namespace App\View\Components;

use App\Models\Painting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PaintingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Painting $painting,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.painting-card');
    }
}
