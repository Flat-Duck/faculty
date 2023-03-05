<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class Notice extends Component
{
    public $notice;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($notice)
    {
        $this->notice = $notice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.notice');
    }
}
