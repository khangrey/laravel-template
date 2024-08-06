<?php

declare(strict_types=1);

namespace App\Abstracts\Actions;

use App\Exceptions\UpdateResourceFailedException;
use Exception;

abstract class BaseUpdateAction
{
    protected $task;

    public function run(array $attributes, $id)
    {
        try {
            return $this->task->run($attributes, $id);
        } catch (Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
