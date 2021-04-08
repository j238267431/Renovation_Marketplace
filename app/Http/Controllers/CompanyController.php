<?php

namespace App\Http\Controllers;

use App\Models\Company;


class CompanyController extends Controller
{
  public function index()
  {
    return view('companies.index', [
      'companies' => Company::all(),
    ]);
  }


  public function show(Company $company)
  {
    echo 'Страница компании ' . $company->id;
    var_dump($company);
  }
}