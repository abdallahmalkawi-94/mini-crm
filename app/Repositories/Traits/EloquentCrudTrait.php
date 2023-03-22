<?php

namespace App\Repositories\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

trait EloquentCrudTrait
{
    public function create(array $data)
    {
        return $this->model::query()->create($data);
    }

    public function read(array $attributes = ['*'], array $conditions = [], int $perPage = 10): LengthAwarePaginator
    {
        return $this->model::query()->select($attributes)->where($conditions)->paginate($perPage);
    }

    public function update(array $data, array $conditions = []): bool
    {
        return $this->model::query()->where($conditions)->update($data);
    }

    public function delete(bool $force = false, array $conditions = []): bool
    {
        $method = $force ? 'forceDelete' : 'delete';

        return $this->model::query()->where($conditions)->{$method}();
    }
}
