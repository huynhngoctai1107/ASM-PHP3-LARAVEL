<?php

namespace App\View\Components\client\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class quantity extends Component
{
    /**
     * Create a new component instance.
     */
    public $name; 
    public $value; 
    public function __construct($name, $value)
    {
        $this->name = $name; 
        $this->value = $value ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.button.quantity');
    }
}
