<?php

use App\Models\Music;
use App\Models\Playlist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertModelMissing;
use function Pest\Laravel\delete;
use function Pest\Laravel\from;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('should be able to render playlist page', function () {
    get(route('playlists.index'))->assertOk()->assertViewIs('user.playlists.index');
});

it('should be able to list playlists in playlist page', function () {
    Playlist::factory()->for($this->user)->count(2)->create();

    get(route('playlists.index'))
        ->assertViewHas('playlists', fn ($playlists) => $playlists->count() == 2);
});

it('should be able to render create playlist page', function () {
    get(route('playlists.create'))->assertOk()->assertViewIs('user.playlists.create');
});

it('should be able to store playlist', function () {
    $request = [
        'name' => 'My Playlist',
    ];

    post(route('playlists.store'), $request)
        ->assertRedirect(route('playlists.index'));

    assertDatabaseHas(Playlist::class, $request);
});

it('should be able to show playlist', function () {
    $playlist = Playlist::factory()->for($this->user)->create();

    get(route('playlists.show', $playlist->id))
        ->assertViewHas('playlist', fn ($pagePlaylist) => $pagePlaylist->name == $playlist->name);
});

it('should be able to render edit playlist page', function () {
    $playlist = Playlist::factory()->for($this->user)->create();

    get(route('playlists.edit', $playlist->id))
        ->assertOk()
        ->assertViewIs('user.playlists.edit')
        ->assertViewHas('playlist', fn ($pagePlaylist) => $pagePlaylist->name == $playlist->name);
});

it('should be able to update playlist', function () {
    $playlist = Playlist::factory()->for($this->user)->create();
    $request = [
        'name' => 'My Playlist',
    ];

    put(route('playlists.update', $playlist->id), $request)
        ->assertRedirect(route('playlists.index'));

    $request['id'] = $playlist->id;

    assertDatabaseHas(Playlist::class, $request);
});

it('should be able to destroy playlist', function () {
    $playlist = Playlist::factory()->for($this->user)->create();

    $playlistIndexRoute = route('playlists.index');

    from($playlistIndexRoute)->delete(route('playlists.destroy', $playlist->id))->assertSessionHas('success')
        ->assertRedirect($playlistIndexRoute);

    assertModelMissing($playlist);

    // assertDatabaseMissing(Playlist::class, $playlist->toArray());
});

it('should be able to add music to playlist', function () {
    $playlist = Playlist::factory()->for($this->user)->create();
    $music = Music::factory()->create();

    $parameters = ['playlist' => $playlist->id, 'music_id' => $music->id];

    get(route('add-music', $parameters))
        ->assertRedirect(route('playlists.index'));

    assertDatabaseHas('music_playlist', [
        'music_id' => $music->id,
        'playlist_id' => $playlist->id,
    ]);
});
