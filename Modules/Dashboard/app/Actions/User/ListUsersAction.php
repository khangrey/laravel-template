<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Abstracts\Actions\BaseListAction;
use Modules\Dashboard\Tasks\User\ListUsersTask;

final class ListUsersAction extends BaseListAction
{
    public function __construct(ListUsersTask $listUsersTask)
    {
        $this->task = $listUsersTask;
    }
}
