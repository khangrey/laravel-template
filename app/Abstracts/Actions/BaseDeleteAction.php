<?php

declare(strict_types=1);

namespace App\Abstracts\Actions;

use App\Exceptions\DeleteResourceFailedException;
use Exception;

abstract class BaseDeleteAction
{
    protected $task;

    public function run($id)
    {
        try {
            return $this->task->run($id);
        } catch (Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
