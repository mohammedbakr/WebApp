<?php

namespace App\Shop\Customers\Requests;

use App\Shop\Base\BaseFormRequest;
use Illuminate\Validation\Rule;

class RegisterCustomerRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',

            'identity_card' => 'required|file',
//                Rule::exists('customers')->where(function ($query) {
//                    $query->where('company', 1);
//                }),
//            ],
        ];
    }
}
