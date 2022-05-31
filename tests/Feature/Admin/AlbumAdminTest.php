<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create(['is_admin' => true]);
    $this->artist = Artist::factory()->create();
    $this->actingAs($this->user);
});

it('should be able to render albums admin page', function () {
    get(route('admin.artists.albums.index', $this->artist->id))
        ->assertOk()
        ->assertViewIs('admin.albums.index');
});

it('should be able to list albums in albums admin page', function () {
    Album::factory()->for($this->artist)->count(2)->create();

    get(route('admin.artists.albums.index', $this->artist->id))
        ->assertViewHas('artist', fn ($artist) => $artist->name == $this->artist->name)
        ->assertViewHas('artist', fn ($artist) => $artist->albums->count() == 2);
});

it('should be able to render create album page', function () {
    get(route('admin.artists.albums.create', $this->artist->id))
        ->assertOk()
        ->assertViewIs('admin.albums.create');
});

it('should be able to store album', function () {
    $album = Album::factory()->hasFile()->for($this->artist)->make();

    post(route('admin.artists.albums.store', $this->artist->id), $album->toArray())
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.artists.albums.index', $this->artist->id));
    $album->cover_image = $album->cover_image->store('images/albums');
    $this->assertDatabaseHas('albums', $album->toArray());
});

it('should be able to render edit album page', function () {
    $album = Album::factory()->for($this->artist)->create();

    get(route('admin.albums.edit', [$this->artist->id, $album->id]))
        ->assertOk()
        ->assertViewIs('admin.albums.edit')
        ->assertViewHas('album', fn ($pageAlbum) => $pageAlbum->name == $album->name);
});

it('should be able to update album', function () {
    $album = Album::factory()->for($this->artist)->create();
    $albumRequest = Album::factory()->hasFile()->for($this->artist)->make();

    put(route('admin.albums.update', $album->id), $albumRequest->toArray())
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.artists.albums.index', $this->artist->id));
    $albumRequest->cover_image = $albumRequest->cover_image->store('images/albums');
    assertDatabaseHas(Album::class, $albumRequest->toArray());
});

it('should be able to destroy album', function () {
    $album = Album::factory()->for($this->artist)->create();

    delete(route('admin.albums.destroy', [$this->artist->id, $album->id]))
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.artists.albums.index', $this->artist->id));
    $this->assertDatabaseMissing(Album::class, $album->toArray());
});
