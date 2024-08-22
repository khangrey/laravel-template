<?php

declare(strict_types=1);

namespace App\Abstracts\Tasks;

abstract class BaseListTask
{
    protected $repository;

    public function run(
        ?int $limit = null,
        bool $paginate = false,
        string $orderBy = 'id',
        string $orderDirection = 'asc',
        $exceptId = null,
    ) {
        $query = $this
            ->repository
            ->orderBy($orderBy, $orderDirection);

        if ($exceptId) {
            $query->where('id', '<>', $exceptId);
        }

        if ($paginate) {
            return $query->paginate($limit);
        }

        return $limit ? $query->limit($limit) : $query->all();
    }
}
