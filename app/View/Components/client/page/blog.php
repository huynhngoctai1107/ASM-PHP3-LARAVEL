<?php

namespace App\View\Components\client\page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blog extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;
    public function __construct($post)
    {
        $this->post=$post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.page.blog');
    }
}
