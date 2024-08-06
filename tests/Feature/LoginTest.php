<?php

declare(strict_types=1);

use App\Models\User;

test('app has login page', function (): void {
    $this->get(route('dashboard.login'))->assertResponse(200);
});

test('can user login', function (): void {
    $this->post(route('dashboard.login'), [
        'email' => User::factory()->create()->email,
        'password' => 'password',
    ])->assertRedirect(route('dashboard.welcome'));
});

test('email validation', function (): void {
    $this
        ->post(
            'auth/login',
            [
                'email' => '',
                'password' => 'password',
            ]
        )->assertInvalid('email');
});

test('password validation', function (): void {
    $this
        ->post(
            'auth/login',
            [
                'email' => User::factory()->create()->email,
            ]
        )
        ->assertInvalid('password');
});

test('can user logout', function (): void {
    $this
        ->actingAs(User::factory()->create())
        ->delete(route('dashboard.logout'))
        ->assertRedirect(route('dashboard.login'));
});
