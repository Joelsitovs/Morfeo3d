<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Services extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $services;
    public function __construct($title, $services)
    {
        $this->title = $title;
        $this->services = $services;
   }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services');
    }
}
