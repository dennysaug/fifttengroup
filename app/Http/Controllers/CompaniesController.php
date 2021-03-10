<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyStatus;
use App\CompanyType;
use App\Http\Requests\CreateCompany;
use App\Http\Requests\UpdateCompany;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::with(['companyType', 'companyStatus'])->get();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        $company = new Company;
        $companyTypes = CompanyType::pluck('name', 'id');
        $companyStatuses = CompanyStatus::pluck('name', 'id');

        return view('companies.create', compact('company', 'companyTypes', 'companyStatuses'));
    }

    public function store(CreateCompany $request)
    {
        Company::create($request->all());

        return redirect('companies')->with('alert', 'Company created!');
    }

    public function edit(Company $company)
    {
        $companyTypes = CompanyType::pluck('name', 'id');
        $companyStatuses = CompanyStatus::pluck('name', 'id');

        return view('companies.edit', compact('company', 'companyTypes', 'companyStatuses'));
    }

    public function update(UpdateCompany $request, Company $company)
    {
        $company->update($request->all());

        return redirect('companies')->with('alert', 'Company updated!');
    }
}
