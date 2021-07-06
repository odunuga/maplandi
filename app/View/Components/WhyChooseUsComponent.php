<?php

namespace App\View\Components;

use Illuminate\View\Component;

class whyChooseUsComponent extends Component
{
    public $why_choose_us;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->why_choose_us = \Modules\Admin\Entities\WhyChooseUs::all()->sortBy('id')->take(4);

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.whychooseus');
    }
}
