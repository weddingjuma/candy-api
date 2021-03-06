<?php

namespace GetCandy\Api\Http\Requests\Tags;

use GetCandy\Api\Http\Requests\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $decodedId = app('api')->tags()->getDecodedId($this->tag);

        return [
            'name' => 'required|array|valid_locales',
        ];
    }
}
