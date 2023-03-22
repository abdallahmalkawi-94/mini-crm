<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CompanyInterface;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected CompanyInterface $company;
    protected EmployeeInterface $employee;

    /**
     * @param CompanyInterface $company
     * @param EmployeeInterface $employee
     */
    public function __construct(CompanyInterface $company, EmployeeInterface $employee)
    {
        $this->company = $company;
        $this->employee = $employee;
    }


}
