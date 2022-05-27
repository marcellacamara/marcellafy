<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

class MusicFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'album_id' => Album::factory(),
            'file' => UploadedFile::fake()->create('music.mp3', 1024)->store('musics'),
        ];
    }
}
