<?php

declare(strict_types=1);

namespace App\Abstracts\Actions;

abstract class BaseFindAction
{
    protected $task;

    public function run($id)
    {
        return $this->task->run($id);
    }
}
