<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->word,
            'description'   => $this->faker->sentence,
            'price'         => $this->faker->randomFloat(2, 10, 9999),
            'quantity'      => $this->faker->randomDigit
        ];
    }
}
