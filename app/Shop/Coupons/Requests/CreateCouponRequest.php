<?php

namespace App\Shop\Coupons\Requests;

use App\Shop\Base\BaseFormRequest;

class CreateCouponRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'code' => ['required', 'unique:coupons'],
            'type' => ['required'],
        ];
    }
}
