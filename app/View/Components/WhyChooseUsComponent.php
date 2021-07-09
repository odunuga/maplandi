<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WhyChooseUsComponent extends Component
{
    public $why_choose_us;
    public $why_choose_us_title;
    public $why_choose_us_details;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->why_choose_us_title = 'Why Choose Us';
        $this->why_choose_us_details = 'At Maplandi we are commited to delivering everything you could possibly need for life and living at the best prices than anywhere else.';
        $this->why_choose_us = \Modules\Admin\Entities\WhyChooseUs::all()->sortBy('id')->take(6);

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
