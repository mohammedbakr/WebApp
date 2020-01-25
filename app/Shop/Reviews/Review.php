<?php

namespace App\Shop\Reviews;

use App\Shop\Customers\Customer;
use App\Shop\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'employee_id',
        'customer_id',
        'rating',
        'comment',
        'status'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}