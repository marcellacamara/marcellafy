<?php

use App\Models\Playlist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('should not be able to store playlist without required fields', function () {
    post(route('playlists.store'), [])
        ->assertSessionHasErrors(['name']);
});

it('should not be able to update playlist without required fields', function () {
    $playlist = Playlist::factory()->for($this->user)->create();

    put(route('playlists.update', $playlist->id), [])
        ->assertSessionHasErrors(['name']);
});

it('should not be able to update playlist with invalid id', function () {

    put(route('playlists.update', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to edit playlist with invalid id', function () {

    get(route('playlists.edit', 'invalid-id'))
        ->assertNotFound();
});

it('should not be able to show playlist with invalid id', function () {

    get(route('playlists.show', 'invalid-id'))
        ->assertNotFound();
});
