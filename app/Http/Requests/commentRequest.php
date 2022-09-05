<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class commentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /** Validation and Error Message */
            'comment' => 'required | min:10 | max:500 | string',
            'status' => 'required',
            'product_id' => 'required | integer',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'comment.min' => trans('validation.min'),
            'comment.required' => trans('validation.required'),
            'comment.max' => trans('validation.max'),
            'comment.string' => trans('validation.string'),

            'status.required' => trans('validation.required'),

            'amount.required' => trans('validation.required'),
            'amount.integer' => trans('validation.integer'),

            'product_id.required' => trans('validation.required'),

            'user_id.required' => trans('validation.required'),
        ];
    }
}
