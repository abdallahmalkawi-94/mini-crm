<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
class EmployeeController extends Controller
{
    public function index(): Factory|View|Application
    {
        $employees = $this->employee->read();
        return view('Employees.index', compact('employees'));
    }

    public function store(EmployeeRequest $request): RedirectResponse
    {
        $this->employee->create($request->all());
        return redirect()->route('employee.index')->with(['message' => "The Employee Created Successful."]);
    }

    public function create(): Factory|View|Application
    {
        $companies = $this->company->all()->pluck('name', 'id')->toArray();
        return view('Employees.create', compact('companies'));
    }

    public function edit(Employee $employee): Factory|View|Application
    {
        $companies = $this->company->all()->pluck('name', 'id')->toArray();
        return view('Employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request): RedirectResponse
    {
        $this->employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_id' => $request->input('company_id'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ], ['id' => $request->input('id')]);
        return redirect()->route('employee.index')->with(['message' => "The Employee Updated Successful."]);
    }
}
