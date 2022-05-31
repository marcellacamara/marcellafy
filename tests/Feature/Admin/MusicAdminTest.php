<?php

use App\Models\Album;
use App\Models\Music;
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
    $this->album = Album::factory()->create();
    $this->actingAs($this->user);
});

it('should be able to render music admin page', function () {
    get(route('admin.albums.musics.index', $this->album->id))
        ->assertOk()
        ->assertViewIs('admin.musics.index');
});

it('should be able to list musics in music admin page', function () {
    Music::factory()->for($this->album)->count(2)->create();

    get(route('admin.albums.musics.index', $this->album->id))
        ->assertViewHas('album', fn ($album) => $album->name == $this->album->name)
        ->assertViewHas('album', fn ($album) => $album->musics->count() == 2);
});

it('should be able to render create music page', function () {
    get(route('admin.albums.musics.create', $this->album->id))
        ->assertOk()
        ->assertViewIs('admin.musics.create');
});

it('should be able to store music', function () {
    $music = Music::factory()->hasFile()->for($this->album)->make();

    post(route('admin.albums.musics.store', $this->album->id), $music->toArray())
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.albums.musics.index', $this->album->id));
    $music->file = $music->file->store('musics');
    $this->assertDatabaseHas('musics', $music->toArray());
});

it('should be able to render edit music page', function () {
    $music = Music::factory()->for($this->album)->create();

    get(route('admin.musics.edit', [$this->album->id, $music->id]))
        ->assertOk()
        ->assertViewIs('admin.musics.edit')
        ->assertViewHas('music', fn ($pageMusic) => $pageMusic->name == $music->name);
});

it('should be able to update music', function () {
    $music = Music::factory()->for($this->album)->create();
    $musicRequest = Music::factory()->hasFile()->for($this->album)->make();

    put(route('admin.musics.update', [$this->album->id, $music->id]), $musicRequest->toArray())
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.albums.musics.index', $this->album->id));
    $musicRequest->file = $musicRequest->file->store('musics');
    assertDatabaseHas(Music::class, $musicRequest->toArray());
});

it('should be able to destroy music', function () {
    $music = Music::factory()->for($this->album)->create();

    delete(route('admin.musics.destroy', [$this->album->id, $music->id]))
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('admin.albums.musics.index', $this->album->id));
    $this->assertDatabaseMissing(Music::class, $music->toArray());
});
