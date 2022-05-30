<?php

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
    $this->actingAs($this->user);
});

it('should not be able to store artists without required fields', function () {
    post(route('admin.artists.store'), [])
        ->assertSessionHasErrors(['name', 'avatar']);
});

it('should not be able to update artists without required fields', function () {
    $artist = Artist::factory()->create();

    put(route('admin.artists.update', $artist->id), [])
        ->assertSessionHasErrors(['name', 'avatar']);
});

it('should not be able to store artists with avatar that is not an image', function () {
    $request = [
        'avatar' => UploadedFile::fake()->create('file', 1024),
    ];

    post(route('admin.artists.store'), $request)
        ->assertSessionHasErrors(['avatar']);
});

it('should not be able to update artists with avatar that is not an image', function () {
    $artist = Artist::factory()->create();
    $request = [
        'avatar' => UploadedFile::fake()->create('file', 1024),
    ];

    put(route('admin.artists.update', $artist->id), $request)
        ->assertSessionHasErrors(['avatar']);
});

it('should not be able to update artists with invalid id', function () {

    put(route('admin.artists.update', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to edit artists with invalid id', function () {

    get(route('admin.artists.edit', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to show artists with invalid id', function () {

    get(route('admin.artists.show', 'invalid-id'))
        ->assertNotFound();
});
