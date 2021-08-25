<?php

namespace Database\Factories;

use App\Models\channels;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = channels::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->word(),
            ];
    }
}
