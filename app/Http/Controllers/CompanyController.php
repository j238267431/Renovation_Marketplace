<?php

namespace App\Http\Controllers;

use App\Models\Company;

use App\Models\Offer;
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
      $offers = Offer::all();
        $categories = Category::all();
      $companies = Company::inRandomOrder()->paginate($this->countOnePagePaginate);
        return view('companies.index', [
            'companies' => $companies,
            'categories' => $categories,
//            'offers' => $offers,
        ]);

  }

    public function allFromCategory(Category $category): \Illuminate\Contracts\View\View
    {
//        $offers = $category->offers()->with('company')->get()->unique('company_id');
        $companies = $category->companiesByCategory()->distinct()->get();
        $categories = Category::all();
        $categoryId = $category->id;
//        $companies = Company::inRandomOrder()->paginate($this->countOnePagePaginate);
        return view('companies.index', [
//            'offers' => $offers,
            'companies' => $companies,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'categoryName' => $category->name]);
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
