<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\CartController;
use App\Shop\Cart\Requests\CartCheckoutRequest;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\Repositories\Interfaces\CartRepositoryInterface;
use App\Shop\Coupons\Coupon;

class CouponController extends Controller
{

    public $testSub;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'Adding Coupon';
        $coupon = Coupon::where('code', $request->input('couponCode'))->first();

        if(!$coupon){
            return redirect()->route('cart.index')->withErrors('Invalid Coupon Code, Please try again');
        }

        if( $coupon->status == 1){

            session()->put('coupon', [
                'name' => $coupon->name,
                'discount' => $coupon->discount(Cart::subtotal()),
            ]);

            return redirect()->route('cart.index')->withErrors('Coupon has been added successfully');
            
        }else {
            return redirect()->route('cart.index')->withErrors('Coupon has been removed, can\'t be used anymore!');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        return redirect()->route('cart.index')->withErrors('Coupon has been removed');
    }
}
