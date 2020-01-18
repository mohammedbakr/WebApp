<?php

namespace App\Shop\Coupons\Repositories;


use App\Shop\Coupons\Exceptions\CouponCreateErrorException;
use App\Shop\Coupons\Exceptions\CouponUpdateErrorException;
use Jsdecena\Baserepo\BaseRepository;
use App\Shop\Coupons\Exceptions\CouponNotFoundException;
use App\Shop\Coupons\Coupon;
use App\Shop\Coupons\Repositories\Interfaces\CouponRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{
    /**
     * CouponRepository constructor.
     * @param Coupon $coupon
     */
    public function __construct(Coupon $coupon)
    {
        parent::__construct($coupon);
        $this->model = $coupon;
    }

    /**
     * List all the coupons
     *
     * @param string $order
     * @param string $sort
     * @return Collection
     */
    public function listCoupons(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * Create the coupon
     *
     * @param array $data
     *
     * @return Coupon
     * @throws CouponCreateErrorException
     */
    public function createCoupon(array $data) : Coupon
    {
        try {
            return $this->create($data);
        } catch (QueryException $e) {
            throw new CouponCreateErrorException($e);
        }
    }

    /**
     * Update the coupon
     *
     * @param array $data
     *
     * @return bool
     * @throws CouponUpdateErrorException
     */
    public function updateCoupon(array $data) : bool
    {
        try {
            return $this->model->update($data);
        } catch (QueryException $e) {
            throw new CouponUpdateErrorException($e);
        }
    }

    /**
     * Find the cuoupon by ID
     *
     * @param int $id
     *
     * @return Cuoupon
     * @throws CouponNotFoundException
     */
    public function findCouponById(int $id) : Coupon
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CouponNotFoundException($e);
        }
    }

    /**
     * Delete the coupon
     *
     * @param Coupon $coupon
     *
     * @return bool
     * @throws \Exception
     * @deprecated
     * @use removeCoupon
     */
    public function deleteCoupon() : bool
    {
        return $this->delete();
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function removeCoupon() : bool
    {
        return $this->model->where('id', $this->model->id)->delete();
    }

    /**
     * @param string $text
     * @return mixed
     */
    public function searchCoupon(string $text) : Collection
    {
        if (!empty($text)) {
            return $this->model->searchCoupon($text);
        } else {
            return $this->listCoupons();
        }
    }
}
