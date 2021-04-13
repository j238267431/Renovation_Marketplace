<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;

class CompanyController extends Controller
{
  public function index()
  {
    return view('companies.index', [
      'companies' => Company::all(),
      'categories' => Category::orderBy('name')->get(),
    ]);
  }


  public function show(Company $company)
  {
    return view('companies.show', [
      'company' => $company
    ]);
  }
}
