<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;

class CompanyController extends Controller
{
	public function create()
	{
		$master = Company::all();
		$master = (object)$master;
		return view('companies.create')->withMaster($master);

	}

	public function store(Request $request)
	{
		$company = new Company;

		$company->name = $request->company_name;
		$company->master_company= $request->master_company;
		$company->status = $request->status;

		$company->save();

		return redirect()->route('company.create');

	}

	public function edit($id)
	{
		$master = Company::all();
		$company = Company::find($id);
		$master = (object)$master;
		return view('companies.edit')->withMaster($master)->withCompany($company);

	}

	public function update(Request $request, $id)
	{
		$company = Company::find($id);

		$company->name = $request->input('company_name');
		$company->master_company= $request->input('master_company');
		$company->status = $request->input('status');

		$company->save();

		return redirect()->route('company.create');

	}

    //
}
