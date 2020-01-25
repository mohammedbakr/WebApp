<?php

namespace App\Shop\Reviews\Repositories;

use App\Shop\Reviews\Exceptions\ReviewCreateErrorException;
use App\Shop\Reviews\Exceptions\ReviewNotFoundException;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Reviews\Review;
use App\Shop\Reviews\Repositories\Interfaces\ReviewRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection; 

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    /**
     * ReviewRepository constructor.
     * @param Review $review
     */
    public function __construct(Review $review)
    {
        parent::__construct($review);
        $this->model = $review;
    }

    /**
     * List all the reviews
     *
     * @param string $order
     * @param string $sort
     * @return Collection
     */
    public function listReviews(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }


    /**
     * Create the Review
     *
     * @param array $data
     *
     * @return Review
     * @throws ReviewCreateErrorException
     */
    public function createReview(array $data) : Review
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new ReviewCreateErrorException($e);
        }
    }

    /**
     * Find the review by ID
     *
     * @param int $id
     *
     * @return Review
     * @throws ReviewNotFoundException
     */
    public function findReviewById(int $id) : Review
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ReviewNotFoundException($e);
        }
    }

    /**
     * Delete the Review
     *
     * @param Review $review
     *
     * @return bool
     * @throws \Exception
     * @deprecated
     * @use removeReview
     */
    public function deleteReview() : bool
    {
        return $this->delete();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function removeReview() : bool
    {
        return $this->model->where('id', $this->model->id)->delete();
    }
}