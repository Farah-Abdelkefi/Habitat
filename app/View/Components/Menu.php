<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Menu extends Component
{

    /**
     *
     * @var boolean
     */
    public $pocket;

    /**
     * Create the component instance.
     *
     * @param  boolean  $pocket
     * @return void
     */
    public function __construct($pocket)
    {
        $this->pocket = $pocket;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.menu', [
            'categories' => Category::all()
        ]);
    }
}
