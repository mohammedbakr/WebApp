<?php

namespace App\Shop\Reviews\Requests;

use App\Shop\Base\BaseFormRequest;
use App\Shop\Customers\Customer;
use App\Shop\Reviews\Review;

class CreateReviewRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rating' => 'required',
            'comment' => 'required',
        ];
    }
}