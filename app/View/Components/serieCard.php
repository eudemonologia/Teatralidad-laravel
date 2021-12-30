<?php

namespace App\View\Components;

use Illuminate\View\Component;

class serieCard extends Component
{
    public $serie;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($serie)
    {
        $this->serie = $serie;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.serie-card');
    }
}
