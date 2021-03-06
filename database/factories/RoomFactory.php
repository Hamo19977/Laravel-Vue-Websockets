<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    public function definition()
    {

        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->sentence,
        ];
    }
}
