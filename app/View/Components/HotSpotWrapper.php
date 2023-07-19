<?php

namespace App\View\Components;

use App\Models\HotSpotInput;
use App\Models\Variables;
use Illuminate\View\Component;

class HotSpotWrapper extends Component
{
    /**
     * Create the component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.hotspot-wrapper', [
            'hotspot_img' => Variables::firstWhere('name','hotspot_img'),
            'hotspots' => HotSpotInput::all()
        ]);
    }
}
