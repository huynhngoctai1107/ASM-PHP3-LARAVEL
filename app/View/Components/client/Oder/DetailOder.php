<?php

namespace App\View\Components\Client\Oder;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailOder extends Component
{
    public $oder ;
    public $product;
    
    public function __construct($oder,$product )
    {
        $this->oder = $oder ;
        $this->product = $product;
 
    }
   
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.oder.detail-oder');
    }
}
