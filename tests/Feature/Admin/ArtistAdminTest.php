<?php

use App\Models\Album;
use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\assertDeleted;
use function Pest\Laravel\assertModelExists;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create(['is_admin' => true]);
    $this->actingAs($this->user);
});

it('should be able to render artists admin page', function () {
    get(route('admin.artists.index'))->assertOk()->assertViewIs('admin.artists.index');
});

it('should be able to list artists in artists admin page', function () {
    Artist::factory()->count(4)->create();

    get(route('admin.artists.index'))
        ->assertViewHas('artists', fn ($artists) => $artists->count() == 4);
});

it('should be able to render create artist page', function () {
    get(route('admin.artists.create'))->assertOk()->assertViewIs('admin.artists.create');
});

it('should be able to store artist', function () {
    $avatarFile = UploadedFile::fake()->image('avatar.jpg');
    $request = [
        'name' => 'My Artist',
        'avatar' => $avatarFile,
    ];

    post(route('admin.artists.store'), $request)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.artists.index'));

    $request['avatar'] = $avatarFile->store('images/artists');

    assertDatabaseHas(Artist::class, $request);
});

it('should be able to render edit artist page', function () {
    $artist = Artist::factory()->create();

    get(route('admin.artists.edit', $artist->id))
        ->assertOk()
        ->assertViewIs('admin.artists.edit')
        ->assertViewHas('artist', fn ($pageArtist) => $pageArtist->name == $artist->name);
});

it('should be able to update artist', function () {
    $artist = Artist::factory()->create();
    $avatarFile = UploadedFile::fake()->image('avatar.jpg');
    $request = [
        'name' => 'My Artist',
        'avatar' => $avatarFile,
    ];

    put(route('admin.artists.update', $artist->id), $request)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.artists.index'));

    $request['avatar'] = $avatarFile->store('images/artists');

    assertDatabaseHas(Artist::class, $request);
});

it('should be able to destroy artist', function () {
    $artist = Artist::factory()->create();

    $artistIndexRoute = route('admin.artists.index');

    delete(route('admin.artists.destroy', $artist->id))
        ->assertRedirect($artistIndexRoute);

    assertDatabaseMissing(Artist::class, ['id' => $artist->id]);
});

it('should not be able to destroy artist with albums', function () {
    $artist = Artist::factory()->create();
    $album = Album::factory()->for($artist)->create();

    delete(route('admin.artists.destroy', $artist->id))
        ->assertSessionHasErrors()
        ->assertRedirect();

    assertModelExists($artist);
    assertModelExists($album);
});
