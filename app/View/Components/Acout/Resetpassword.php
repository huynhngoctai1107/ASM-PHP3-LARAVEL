<?php

namespace App\View\Components\Acout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Resetpassword extends Component
{
    /**
     * Create a new component instance.
     */
    public $acout; 
    public function __construct($acout)

    {
    
        $this->acout = $acout ;    //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.acout.resetpassword');
    }
}
