<?php

namespace App\Http\Controllers\Admin\Reviews;

use Illuminate\Http\Request;
use App\Shop\Reviews\Review;
use App\Http\Controllers\Controller;
use App\Shop\Reviews\Repositories\Interfaces\ReviewRepositoryInterface;
use App\Shop\Reviews\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepo;

    /**
     * ReviewController constructor.
     *
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepo = $reviewRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $list = $this->reviewRepo->listReviews('created_at', 'desc');
        
        $reviews = $this->reviewRepo->paginateArrayResults($list->all());

        return view('admin.reviews.list', compact('reviews'));
    }

    public function approval(Request $request)
    {
        $review = Review::find($request->reviewId);
        $approveVal = $request->input('status');
        if($approveVal == 'on'){
            $approveVal = 1;
        }else{
            $approveVal = 0;
        }

        $review->status = $approveVal;
        $review->save();

        if($review->status == 1){
            return back()->with('message', 'Approved Successfully');
        }else{
            return back()->with('message', 'Changed To Not Approved Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $review = $this->reviewRepo->findReviewById($id);
        
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $review = $this->reviewRepo->findReviewById($id);

        $reviewRepo = new ReviewRepository($review);
        $reviewRepo->deleteReview();

        return back()->with('message', 'Deleted Successfully');
    }
}