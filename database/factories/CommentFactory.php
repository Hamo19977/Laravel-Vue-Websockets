<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class CommentFactory extends Factory
{
    public function definition()
    {
        $from = rand(1, 15);
        $room = rand(1,5);
        return [
            'user_id' => $from,
            'room_id' => $room,
            'text' => $this->faker->sentence
        ];
    }
}
