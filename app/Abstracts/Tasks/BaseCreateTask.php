<?php

declare(strict_types=1);

namespace App\Abstracts\Tasks;

abstract class BaseCreateTask
{
    protected $repository;

    public function run(array $attributes)
    {
        return $this->repository->create($attributes);
    }
}
