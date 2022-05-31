<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\post;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->artist = Artist::factory()->create();
    $this->actingAs($this->user);
});

it('should not be able to store albums without required fields', function () {
    post(route('admin.artists.albums.store', $this->artist->id), [])
        ->assertSessionHasErrors(['title', 'cover_image', 'year']);
});

it('should not be able to update albums without required fields', function () {
    $album = Album::factory()->for($this->artist)->create([
        'artist_id' => $this->artist->id,
    ]);

    post(route('admin.albums.update', $album->id), [])
        ->assertSessionHasErrors(['title', 'cover_image', 'year']);
});
