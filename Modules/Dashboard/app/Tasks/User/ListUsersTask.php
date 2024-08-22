<?php

declare(strict_types=1);

namespace Modules\Dashboard\Tasks\User;

use App\Abstracts\Tasks\BaseListTask;
use Modules\Dashboard\Repositories\UserRepository;

final class ListUsersTask extends BaseListTask
{
    public function __construct()
    {
        $this->repository = app(UserRepository::class);
    }
}
