<?php

namespace App\Shop\Types\Requests;

use App\Shop\Base\BaseFormRequest;

class CreateTypeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function types()
    {
        return [
            'name' => ['required', 'unique:types']
        ];
    }
}
