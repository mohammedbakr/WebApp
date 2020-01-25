<?php

namespace App\Shop\Reviews\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Shop\Reviews\Review;
use Illuminate\Support\Collection;


interface ReviewRepositoryInterface extends BaseRepositoryInterface
{
    public function listReviews(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;
 
    public function createReview(array $data) : Review;

    public function findReviewById(int $id) : Review;

    public function deleteReview() : bool;

    public function removeReview() : bool;
}