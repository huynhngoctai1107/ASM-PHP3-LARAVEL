<?php

namespace App\View\Components\Acout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class recaptchav3 extends Component
{
    /**
     * Create a new component instance.
     */
    public $value ;
    public $nameRecaptcha;
    public function __construct($nameRecaptcha,$value )
    {
    $this->value =$value ;
    $this->nameRecaptcha=$nameRecaptcha;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.acout.recaptchav3');
    }
}
