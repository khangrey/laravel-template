<?php

declare(strict_types=1);

namespace App\Abstracts\Actions;

use App\Exceptions\CreateResourceFailedException;
use Exception;

abstract class BaseCreateAction
{
    protected $task;

    public function run(array $attributes)
    {
        try {
            return $this->task->run($attributes);
        } catch (Exception $e) {
            throw new CreateResourceFailedException($e->getMessage());
        }
    }
}
