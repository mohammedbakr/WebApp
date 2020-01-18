<?php

namespace App\Shop\Checkout;

use App\Events\OrderCreateEvent;
use App\Shop\Carts\Repositories\CartRepository;
use App\Shop\Carts\ShoppingCart;
use App\Shop\Orders\Order;
use App\Shop\Orders\Repositories\OrderRepository;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutRepository
{
    /**
     * @param array $data
     *
     * @return Order
     */
    public function buildCheckoutItems(array $data) : Order
    {
        $orderRepo = new OrderRepository(new Order);

        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubtotal = (Cart::subTotal() - $discount);
        $newTotal = $newSubtotal;

        $order = $orderRepo->createOrder([
            'reference' => $data['reference'],
            'courier_id' => $data['courier_id'],
            'customer_id' => $data['customer_id'],
            'address_id' => $data['address_id'],
            'order_status_id' => $data['order_status_id'],
            'payment' => $data['payment'],
            'discounts' => $discount,
            'total_products' => $data['total_products'],
            'total' => $newTotal,
            'total_paid' => $data['total_paid'],
            'total_shipping' => isset($data['total_shipping']) ? $data['total_shipping'] : 0,
            'tax' => $data['tax']
        ]);

        return $order;
    }
}