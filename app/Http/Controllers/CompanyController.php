<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

class CompanyController extends Controller
{
    public function index(): Factory|View|Application
    {
        $companies = $this->company->read();

        return view('Companies.index', compact('companies'));
    }

    public function store(CompanyRequest $request): RedirectResponse
    {

        $company = $this->company->create($request->all());
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('public', $filename);
            $company->update(['logo' => $path]);
        }
        return redirect()->route('company.index')->with(['message' => "The Company Created Successful."]);
    }

    public function create(): Factory|View|Application
    {
        return view('Companies.create');
    }

    public function edit(Company $company): Factory|View|Application
    {
        return view('Companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request): RedirectResponse
    {
        $this->company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $request->input('logo'),
        ], ['id' => $request->input('id')]);
        return redirect()->route('company.index')->with(['message' => "The Company Updated Successful."]);
    }
}
