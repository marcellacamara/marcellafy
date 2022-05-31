<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

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
    $album = Album::factory()->for($this->artist)->create();

    put(route('admin.albums.update', $album->id), [])
        ->assertSessionHasErrors(['title', 'cover_image', 'year']);
});

it('should not be able to store albums with cover_image that is not an image', function () {
    $request = [
        'cover_image' => UploadedFile::fake()->create('file', 1024),
    ];

    post(route('admin.artists.albums.store', $this->artist->id), $request)
        ->assertSessionHasErrors(['cover_image']);
});

it('should not be able to update albums with cover_image that is not an image', function () {
    $album = Album::factory()->for($this->artist)->create();
    $request = [
        'cover_image' => UploadedFile::fake()->create('file', 1024),
    ];

    put(route('admin.albums.update', $album->id), $request)
        ->assertSessionHasErrors(['cover_image']);
});

it('should not be able to update albums with invalid id', function () {

    put(route('admin.albums.update', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to edit albums with invalid id', function () {

    get(route('admin.albums.edit', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to show albums with invalid id', function () {
    get(route('admin.albums.show', 'invalid-id'))
        ->assertNotFound();
});
