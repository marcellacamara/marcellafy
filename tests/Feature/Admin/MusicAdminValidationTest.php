<?php

use App\Models\Album;
use App\Models\Music;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create(['is_admin' => true]);
    $this->album = Album::factory()->create();
    $this->actingAs($this->user);
});

it('should not be able to store music without required fields', function () {
    post(route('admin.albums.musics.store', $this->album->id), [])
        ->assertSessionHasErrors(['title', 'file']);
});

it('should not be able to update musics without required fields', function () {
    $music = Music::factory()->for($this->album)->create();

    put(route('admin.musics.update', $music->id), [])
        ->assertSessionHasErrors(['title', 'file']);
});

it('should not be able to store musics with file that is not an audio', function () {
    $request = [
        'file' => UploadedFile::fake()->create('file', 1024),
    ];

    post(route('admin.albums.musics.store', $this->album->id), $request)
        ->assertSessionHasErrors(['file']);
});

it('should not be able to update musics with file that is not an audio', function () {
    $music = Music::factory()->for($this->album)->create();
    $request = [
        'file' => UploadedFile::fake()->create('file', 1024),
    ];

    put(route('admin.musics.update', $music->id), $request)
        ->assertSessionHasErrors(['file']);
});

it('should not be able to update musics with invalid id', function () {

    put(route('admin.musics.update', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to edit musics with invalid id', function () {

    get(route('admin.musics.edit', 'invalid-id'))
        ->assertNotFound();
});
