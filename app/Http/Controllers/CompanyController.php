<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

  private int $countOnePagePaginate = 5;
  /**
   * Вывод все компаний
   */
  public function index(Request $request)
  {

    $categories = Category::withCount('projects as counter')->orderBy('name')->get()->where('counter', '>', 0);
    $categoryId = null;
    if ($request->input("category")) {
      $categoryId = $request->input("category");
      $companies = Company::with('projects')->whereHas('projects', function ($q) use ($categoryId) {
        $q->where("category_id", $categoryId);
      });
    } else {
      $companies = Company::orderBy("name");
    }
    $companies = $companies->paginate($this->countOnePagePaginate);
    
    return view('companies.index', [
      'companies'  => $companies,
      'categories' => $categories,
      'category'   => Category::find($categoryId)
    ]);
  }

  /**
   * Вывод компаний только, у которых есть проекты или заказы
   * @return View
   */
  public function activeIndex(): View
  {
    $companies = Company::has('projects')->orHas('offers')
      ->inRandomOrder()->paginate($this->countOnePagePaginate);
    return view('companies.index', [
      'companies' => $companies,
    ]);
  }

  public function show(Company $company)
  {

    return view('companies.show', [
      'company' => $company
    ]);
  }
}
