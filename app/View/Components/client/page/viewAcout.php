<?php

namespace App\View\Components\Client\Page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class viewAcout extends Component
{
    /**
     * Create a new component instance.
     */
    public $oder ;
    public $count ;
 
    public $product;
    
    public function __construct($oder,$count,$product)
    {
        $this->oder = $oder ;
        $this->count = $count ;
      
        $this->product=$product;
 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.page.view-acout');
    }
}
