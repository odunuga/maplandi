<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Shop\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6);
        return [
            'sku' => $this->faker->uuid,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->sentence(30),
            'featured' => $this->faker->boolean(20),
            'published' => $this->faker->boolean(20),
            'available' => $this->faker->boolean(90)
        ];
    }
}

