<?php

declare(strict_types=1);

namespace App\Abstracts\Tasks;

abstract class BaseFindTask
{
    protected $repository;

    public function run($id)
    {
        return $this->repository->find($id);
    }
}
