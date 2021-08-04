<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Modules\Admin\Entities\Testimony;

class TestimonialComponent extends Component
{
    public $testimonials;
    public $testimonials_details;
    public $testimonials_title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->testimonials_title = 'What People Say';
        $this->testimonials_details = "We are open to your requests, opinions and suggestions in ways of serving you better";
        $this->testimonials = Testimony::with('user')->inRandomOrder()->where('publish',1)->get()->take(6);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.testimonial');
    }
}
