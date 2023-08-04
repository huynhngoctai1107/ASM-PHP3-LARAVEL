<?php

namespace App\View\Components\Cart;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class shoppingcart extends Component
{
    /**
     * Create a new component instance.
     */
    public $product ;
    public $total; 
    public $number ;
    public function __construct($product,$number, $total)
    {
        $this->total = $total ;
       $this->product = $product;
       $this->number = $number;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart.shoppingcart');
    }
}
