<?php

declare(strict_types=1);

namespace Modules\Dashboard\Enums;

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
