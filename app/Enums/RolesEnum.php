<?php

namespace App\Enums;

enum RolesEnum: string
{
    case SUPERUSER = 'superuser';
    case USER = 'user';

    public function label(): string
    {
        return match ($this) {
            RolesEnum::SUPERUSER => 'Superusers',
            RolesEnum::USER => 'Users'
        };
    }
}
