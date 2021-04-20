<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\CompanyCreate;
use App\Models\Category;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $companies = Auth::user()->companies;
    return view('account.company.index', ['companies' => $companies]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('account.company.create', ['categories' => $categories]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\CompanyCreate  $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function store(CompanyCreate $request)
  {
    $data = $request->validated(); 
    if ($request->file('cover')) {
      $filePath = Storage::putFile('public', $request->file('cover'));
      $data["cover"] = Storage::url($filePath); 
    }

    $company = Company::create($data);

    if ($company) {
      Auth::user()
        ->companies()
        ->attach($company->id, ['user_id' => Auth::id(), 'role_id' => 1]);

      return redirect()
        ->route('company.index')
        ->with('success', 'Компания созадана');
    }
    return back()->with('fail', 'Не удалось создать компанию');
  }
  
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
