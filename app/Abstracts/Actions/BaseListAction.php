<?php

declare(strict_types=1);

namespace App\Abstracts\Actions;

abstract class BaseListAction
{
    protected $task;

    public function run(
        ?int $limit = null,
        bool $paginate = false,
        string $orderBy = 'id',
        string $orderDirection = 'asc',
        $exceptId = null
    ) {
        return $this->task->run($limit, $paginate, $orderBy, $orderDirection, $exceptId);
    }
}
