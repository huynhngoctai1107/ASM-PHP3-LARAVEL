<?php

namespace App\View\Components\admin\page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryproduct extends Component
{
    /**
     * Create a new component instance.
     */
    public $check;
    public function __construct($check)
    {
        $this->check= $check;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.page.categoryproduct');
    }
}
