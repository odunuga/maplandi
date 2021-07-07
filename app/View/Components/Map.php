<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    public $src;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6799391919044!2d3.4795484144218287!3d6.435140225970408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5ca44a21425%3A0x3dd414b496b34543!2s17%20Freedom%20Way%2C%20Ikate%2C%20Bus%20Stop%20101001%2C%20Lekki!5e0!3m2!1sen!2sng!4v1625330874128!5m2!1sen!2sng';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map');
    }
}
