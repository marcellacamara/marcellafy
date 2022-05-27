<?php

use App\Models\Album;
use App\Models\Music;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
    $this->album = Album::factory()->create();
});

it('should be able to render musics page', function () {
    get(route('albums.musics.index', $this->album->artist_id))->assertOk()->assertViewIs('user.musics.index');
});

it('should be able to list musics in music page', function () {
    Music::factory()->for($this->album)->count(2)->create();

    get(route('albums.musics.index', $this->album->artist_id))
        ->assertViewHas('album', fn ($album) => $album->name == $this->album->name)
        ->assertViewHas('album', fn ($album) => $album->musics->count() == 2);
});
