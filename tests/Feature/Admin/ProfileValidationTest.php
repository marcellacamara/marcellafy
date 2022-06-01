<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\put;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

it('should not be able to update user without required fields', function () {
    put(route('user.update'), [])
        ->assertSessionHasErrors(['name', 'email']);
});
