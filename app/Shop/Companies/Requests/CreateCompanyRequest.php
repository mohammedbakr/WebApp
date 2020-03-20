<?php

namespace App\Shop\Projects\Requests;

use App\Shop\Base\BaseFormRequest;

class CreateProjectRequest extends BaseFormRequest
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
            'budget' => ['required', 'numeric']

        ];
    }
}
