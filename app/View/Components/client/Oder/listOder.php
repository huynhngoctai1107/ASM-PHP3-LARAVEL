<?php

namespace App\View\Components\Client\Oder;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class listOder extends Component
{
    /**
     * Create a new component instance.
     */
    public $oder ;
    
    public function __construct($oder )
    {
        $this->oder = $oder ;
 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.oder.list-oder');
    }
}
