<?php

namespace App\Shop\Coupons;

use App\Shop\Orders\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Nicolaslopezj\Searchable\SearchableTrait;

class Coupon extends Model
{
    use SearchableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'type',
        'value',
        'percent_off',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'coupons.name' => 10,
            'coupons.description' => 5
        ]
    ];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function discount($total)
    {
        if($this->type == 'fixed'){
            return $this->value;
        }elseif($this->type == 'percent_off'){
            return ($this->percent_off / 100) * $total;
        }else{
            return 0;
        }
    }

    /**
     * @param string $term
     * @return Collection
     */
    public function searchCoupon(string $term) : Collection
    {
        return self::search($term)->get();
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
