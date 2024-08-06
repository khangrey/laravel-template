<?php

declare(strict_types=1);

namespace App\Abstracts\Tasks;

abstract class BaseUpdateTask
{
    protected $repository;

    public function run(array $attributes, $id)
    {
        return $this->repository->update($attributes, $id);
    }
}
