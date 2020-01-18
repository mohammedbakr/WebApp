<?php

namespace App\Shop\Coupons\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use Illuminate\Support\Collection;
use App\Shop\Coupons\Coupon;

interface CouponRepositoryInterface extends BaseRepositoryInterface
{
    public function listCoupons(string $order = 'id', string $sort = 'desc', array $columns = ['*']) : Collection;

    public function createCoupon(array $data) : Coupon;

    public function updateCoupon(array $data) : bool;

    public function findCouponById(int $id) : Coupon;

    public function deleteCoupon() : bool;

    public function removeCoupon() : bool;

    public function searchCoupon(string $text) : Collection;
}