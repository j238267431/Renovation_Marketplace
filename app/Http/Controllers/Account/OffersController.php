<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfferCreate;
use App\Models\Category;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Auth::user()->companies;
        $hasCompany = Auth::user()->companies()->exists();
        return view(
            'account.company.offer.index',
            [
                'companies' => $companies,
                'hasCompany' => $hasCompany
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Auth::user()->companies;
        $categories = Category::all();
        return view(
            'account.company.offer.create',
            [
                'categories' => $categories,
                'companies' => $companies
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OfferCreate $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferCreate $request)
    {
        $offer = Offer::query()->create([
            'company_id' => $request->company_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($offer) {
            return redirect()->route('account.companies.index')->with('success', 'Услуга успешно добавлена');
        }
        return redirect()->route('account.companies.index')->with('fail', 'Услуга не добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Auth::user()->companies;
        $categories = Category::all();
        $offer = Offer::query()->find($id);
        return view('account.company.offer.edit', [
            'offer' => $offer,
            'companies' => $companies,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfferCreate $request, $id)
    {
        $offer = Offer::query()->find($id)->update([
            'company_id' => $request->company_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($offer) {
            return redirect()->route('account.companies.offer.index')->with('success', 'Услуга успешно изменена');
        }
        return back()->with('fail', 'Услуга не изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Offer::query()->find($id)->delete();
    }
}
