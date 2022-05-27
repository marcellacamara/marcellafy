<?php

use function Pest\Laravel\get;

it('should be able to open the welcome page', function () {
    get('/')->assertOk()->assertViewIs('welcome');
});
