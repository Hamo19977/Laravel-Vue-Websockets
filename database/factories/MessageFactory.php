<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        do{
            $from = rand(1,30);
            $to = rand(1,30);
        } while ($from === $to);

        return [
            'from' => $from,
            'to' => $to,
            'text' => $this->faker->sentence
        ];
    }
}
