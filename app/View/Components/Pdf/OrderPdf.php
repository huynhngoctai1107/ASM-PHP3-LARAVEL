<?php

namespace App\View\Components\Pdf;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderPdf extends Component
{
    /**
     * Create a new component instance.
     */
    public $order ;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pdf.order-pdf');
    }
}
