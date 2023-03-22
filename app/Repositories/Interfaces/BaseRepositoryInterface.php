<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function create(array $data);

    public function read(array $attributes = ['*'], array $conditions = [], int $perPage = 10);

    public function update(array $data, array $conditions = []);

    public function delete(bool $force = false, array $conditions = []): bool;
}
