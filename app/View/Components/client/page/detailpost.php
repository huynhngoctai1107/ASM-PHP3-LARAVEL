<?php

namespace App\View\Components\Client\page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class detailpost extends Component
{
    /**
     * Create a new component instance.
     */
    public $detail;
    public function __construct($detail)
    {
        $this->detail =$detail;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.page.detailpost');
    }
}
