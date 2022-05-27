<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
    $this->artist = Artist::factory()->create();
});

it('should be able to render albums page', function () {
    get(route('artists.albums.index', $this->artist->id))->assertOk()->assertViewIs('user.albums.index');
});

it('should be able to list albums in album page', function () {
    Album::factory()->for($this->artist)->count(2)->create();

    get(route('artists.albums.index', $this->artist->id))
        ->assertViewHas('artist', fn ($pageArtist) => $pageArtist->name == $this->artist->name)
        ->assertViewHas('albums', fn ($albums) => $albums->count() == 2);
});
