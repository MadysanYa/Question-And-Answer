<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PropertyMapAddress extends Component
{
    public $prolatitude;
    public $prolongtitude;
    public $shortAddress;
    public $googlePoint;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($shortAddress, $prolatitude, $prolongtitude, $googlePoint)
    {
        $this->shortAddress = $shortAddress;
        $this->prolatitude = $prolatitude;
        $this->prolongtitude = $prolongtitude;
        $this->googlePoint = $googlePoint;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.property-map-address');
    }
}
