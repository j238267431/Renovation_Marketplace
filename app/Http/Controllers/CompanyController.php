<?php

namespace App\Http\Controllers;

use App\Models\Company;

use Illuminate\View\View;

use App\Models\Category;

class CompanyController extends Controller
{
    private int $countOnePagePaginate = 5;
  /**
   * Вывод все компаний
   */
  public function index()
  {
        $categories = Category::all();
      $companies = Company::inRandomOrder()->paginate($this->countOnePagePaginate);
        return view('companies.index', [
            'companies' => $companies,
            'categories' => $categories
        ]);

  }

    /**
     * Вывод компаний только, у которых есть проекты или заказы
     * @return View
     */
  public function activeIndex() : View
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
