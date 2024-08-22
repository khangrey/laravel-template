<?php

declare(strict_types=1);

namespace Modules\Dashboard\Actions\User;

use App\Abstracts\Actions\BaseDeleteAction;
use Modules\Dashboard\Tasks\User\DeleteUserTask;

final class DeleteUserAction extends BaseDeleteAction
{
    public function __construct(DeleteUserTask $deleteUserTask)
    {
        $this->task = $deleteUserTask;
    }
}
