<?php

namespace App\Http\Controllers;

use App\Models\Company;


use App\Models\Offer;

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
        $offers = Offer::all();

        $categories = Category::all();
        $companies = Company::inRandomOrder()->paginate($this->countOnePagePaginate);
        return view('companies.index', [
            'companies' => $companies,
            'categories' => $categories,
            'categoryId' => null,
            'category' => null,
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
    public function activeIndex(Request $request): View
    {

    $categories = Category::withCount('projects as counter')->orderBy('name')->get()->where('counter', '>', 0);
    $category = null;
    if ($request->input("category")) {
      $category = $request->input("category");
      $companies = Company::with('projects')->whereHas('projects', function ($q) use ($category) {
        $q->where("category_id", $category);
      });
    } else {
      $companies = Company::inRandomOrder();
    }
    $companies = $companies->paginate($this->countOnePagePaginate);
    return view('companies.index', [
      'companies'  => $companies,
      'categories' => $categories,
      'category'   => Category::find($category),
        'categoryId' => null,
    ]);
  }



  public function show(Company $company)
  {

    return view('companies.show', [
      'company' => $company,
        'categoryId' => null,
    ]);
  }
}
