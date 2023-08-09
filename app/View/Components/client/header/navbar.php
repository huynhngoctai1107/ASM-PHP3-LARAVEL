<?php

namespace App\View\Components\client\header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $numberQuantity; 
    public function __construct($numberQuantity)
    {
       $this->numberQuantity= $numberQuantity ;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.header.navbar');
    }
}
