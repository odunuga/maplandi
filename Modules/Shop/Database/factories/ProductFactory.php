<?php

namespace Modules\Shop\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\Shop\Entities\Currency;

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
            'sku' => (double)substr($this->faker->uuid, 1),
            'title' => $title,
            'slug' => Str::slug($title),
            'currency_id' => $this->faker->randomElement(Currency::all()->pluck('id')->toArray()),
            'price' => $this->faker->numberBetween(1000, 10000),
            'description' => $this->faker->sentence(30),
            'featured' => $this->faker->boolean(40),
            'hot' => $this->faker->boolean(40),
            'published' => $this->faker->boolean(90),
            'product_type' => $this->faker->randomElement(['sell', 'rent', null]),
            'available' => $this->faker->boolean(90),
            'stock' => $this->faker->numberBetween(0, 100)
        ];
    }
}

