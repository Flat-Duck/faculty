<?php

namespace App\View\Components\Layout;

use Illuminate\View\Component;

class UserCard extends Component
{
    public $member;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->member = $member;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.user-card');
    }
}
