<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Выводит все отзывы обо всех компаниях
     *
     * @return View
     */
    public function index(): View
    {
        $reviews = Review::all();

        return view('review.index', [
          'reviews' => $reviews,
        ]);
    }

    /**
     * Выводит все отзывы конкретной компании
     * @param \App\Models\Company $company
     * @return View
     */
    public function allFromCompany(Company $company): View
    {
        $reviews = $company->reviews;

        return view('companies.reviews.index', [
            'reviews' => $reviews,
            'company' => $company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($company_id)
    {
        return view('review.create', ['company_id' => $company_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request, $company_id)
    {
      $user_id = 1;
      if(Auth::id()){
        $user_id = Auth::id();
      }

        $feedback = Review::query()->create(
          [
            'company_id' => $company_id,
            'user_id' => $user_id,
            'title' => $request->title,
            'content' => $request->get('content'),
            'rating' => '4',
            'recommend' => '1',
          ]
        );
      if($feedback){
        return redirect()->route('companies.reviews.index', ['company' => $company_id])
          ->with('success', 'отзыв успешно добавлен');
      }
      return back()->with('error', 'отзыв не добавлен');

    }

    /**
     * Выводит конкретный отзыв
     *
     * @param Review $review
     * @return View
     */
    public function show(Review $review): View
    {
        return view('review.show', [
            'company' => $review->company,
            'review'  => $review,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($company_id, $review_id)
    {
      $review = Review::query()->find($review_id);
        return view('review.edit', ['review' => $review, 'company_id'=>$company_id ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $company_id, $id)
    {
        $review = Review::query()->find($id);
        $review->update([
          'title' => $request->title,
          'content' => $request->get('content'),
        ]);
      if($review){
        return redirect()->route('companies.reviews.index', ['company' => $company_id])
          ->with('success', 'отзыв успешно изменен');
      }
      return back()->with('error', 'отзыв не изменен');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($company_id, $review_id)
    {
        Review::destroy($review_id);
    }
}
