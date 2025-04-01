<?php

namespace App\View\Components\Util;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArrowBackPage extends Component
{
    /**
     * Create a new component instance.
     */

    public string $route;
    public array $routeParam;
    public string $title;

    public function __construct(
        string $route = 'tasks.index',
        array $routeParam = [],
        string $title = 'Go back',
    ) {
        $this->route = $route;
        $this->routeParam = $routeParam;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.util.arrow-back-page');
    }
}
