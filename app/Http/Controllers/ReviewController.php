<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     * '
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        $reviews = Review::query()->where('company_id', '=', $company_id)->get();
        return view('customers.review.index', [
          'reviews' => $reviews,
          'company_id' => $company_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        return view('customers.review.create', ['company_id' => $company_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($company, $review)
    {
        return view('customers.review.show', ['company'=> $company,'review'=>$review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id, $review_id)
    {
      $review = Review::query()->find($review_id);
        return view('customers.review.edit', ['review' => $review, 'company_id'=>$company_id ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $review_id)
    {
        Review::destroy($review_id);
    }
}
