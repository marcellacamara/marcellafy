<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class AlbumFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'artist_id' => Artist::factory(),
            'cover_image' => UploadedFile::fake()->image(uniqid() . '.jpg')->store('images/albums'),
            'year' => $this->faker->year(),
        ];
    }
}
