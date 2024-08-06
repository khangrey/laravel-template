<?php

declare(strict_types=1);

test('superuser created', function (): void {
    $this->artisan('create:admin')
        ->expectsQuestion('What is your name?', 'testConsoleCreateUser')
        ->expectsQuestion('What is your email?', 'testConsoleCreateUser@console.loc')
        ->expectsQuestion('What is the password?', 'testConsoleCreateUser');
    $this->assertDatabaseHas('users', ['name' => 'testConsoleCreateUser']);
});
