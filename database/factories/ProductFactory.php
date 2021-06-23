<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             =>  $this->faker->word,
            'code'              =>  $this->faker->numberBetween(231, 489),
            'stock_quantity'    =>  $this->faker->numberBetween(3,5),
            'price'             =>  $this->faker->numberBetween(100, 200)
        ];
    }
}
