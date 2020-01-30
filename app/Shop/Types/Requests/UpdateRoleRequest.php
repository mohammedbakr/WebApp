<?php

namespace App\Shop\Types\Requests;

use App\Shop\Base\BaseFormRequest;

class UpdateTypeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'display_name' => ['required'],
            'roles' => ['array']
        ];
    }
}
