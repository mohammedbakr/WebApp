<?php

use App\Shop\Coupons\Coupon;
use Illuminate\Database\Seeder;

class CouponTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'name' => '30USD sale',
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 3,
            'status' => 1,
        ]);

        Coupon::create([
            'name' => '50% sale',
            'code' => 'DEF456',
            'type' => 'percent_off',
            'percent_off' => 50,
            'status' => 1,
        ]);
    }
}
