<?php

use App\Models\Artist;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('should be able to render dashboard page', function () {
    get(route('dashboard'))->assertOk()->assertViewIs('dashboard');
});

it('should be able to see administrator button when user is administrator', function () {
    $this->user->update(['is_admin' => true]);

    get(route('dashboard'))->assertSeeText('Administrator');
});

it('should be able to not see administrator button when user is not administrator', function () {
    get(route('dashboard'))->assertDontSeeText('Administrator');
});

it('should be able to show artists in dashboard page', function () {
    Artist::factory()->count(4)->create();

    get(route('dashboard'))->assertViewHas('artists', fn ($artists) => $artists->count() == 4);
});
