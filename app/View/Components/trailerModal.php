<?php

namespace App\View\Components;

use Illuminate\View\Component;

class trailerModal extends Component
{
    public $movie;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movie = null)
    {
        $this->movie = $movie;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trailer-modal');
    }
}
