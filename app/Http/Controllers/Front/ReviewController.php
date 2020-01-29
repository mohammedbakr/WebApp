<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Shop\Reviews\Repositories\Interfaces\ReviewRepositoryInterface;
use App\Shop\Reviews\Repositories\ReviewRepository;
use App\Shop\Reviews\Requests\CreateReviewRequest;

class ReviewController extends Controller
{
    /**
     * @var ReviewRepositoryInterface
     */
    private $reviewRepo;

    /**
     * ReviewController constructor.
     * @param ReviewRepositoryInterface $reviewRepository
     */
    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepo = $reviewRepository;
    }

    /**
     * Store a newly created resource in DB.
     *
     * @param  CreateReviewRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReviewRequest $request)
    {
        $data = $request->except('_token', '_method');
        
        $review = $this->reviewRepo->createReview($data);

        $reviewRepo = new ReviewRepository($review);

        return back()->with('message', trans('main.message.Review Added Successfully'));
    }
}