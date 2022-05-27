<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class ArtistFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'avatar' => UploadedFile::fake()->image(uniqid() . '.jpg')->store('images/artists'),
        ];
    }
}
