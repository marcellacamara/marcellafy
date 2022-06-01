<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('should be able to render user page', function () {
    get(route('user'))
        ->assertOk()
        ->assertViewIs('user.edit');
});

it('should be able to update user', function () {
    $request = [
        'name' => 'new name',
        'email' => 'newemail@example.com',
        'password' => 'newpassword',
        'password_confirmation' => 'newpassword',
    ];

    put(route('user.update'), $request)
        ->assertSessionDoesntHaveErrors()
        ->assertRedirect(route('user'));

    assertDatabaseHas(User::class, [
        'name' => $request['name'],
        'email' => $request['email'],
    ]);
});
