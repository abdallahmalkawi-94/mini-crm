<?php

namespace App\Repositories\Concretes\Eloquent;

use App\Models\Company;
use App\Models\Employee;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\CompanyInterface;
use App\Repositories\Interfaces\EmployeeInterface;
use App\Repositories\Traits\EloquentCrudTrait;

class EmployeeEloquentRepository implements BaseRepositoryInterface, EmployeeInterface
{
    use EloquentCrudTrait;

    protected Employee $model;

    /**
     * @param Employee $model
     */
    public function __construct(Employee $model)
    {
        $this->model = $model;
    }


}
