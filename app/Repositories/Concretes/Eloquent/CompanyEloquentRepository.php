<?php

namespace App\Repositories\Concretes\Eloquent;

use App\Models\Company;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CompanyInterface;
use App\Repositories\Traits\EloquentCrudTrait;
use Illuminate\Database\Eloquent\Collection;

class CompanyEloquentRepository implements BaseRepositoryInterface, CompanyInterface
{
    use EloquentCrudTrait;

    protected Company $model;

    /**
     * @param Company $model
     */
    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function all(): Collection|array
    {
        return $this->model::query()->get();
    }
}
