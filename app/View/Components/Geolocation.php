<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Geolocation extends Component
{
    public $isAdmin;
    public $radius;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isAdmin, $radius)
    {
        $this->isAdmin = $isAdmin;
        $this->radius = $radius;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.geolocation');
    }
}
