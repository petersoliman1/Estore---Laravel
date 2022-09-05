<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'name_en' => 'required | min:5 | max:200 | string',
            'name_ar' => 'required | min:5 | max:200 | string',
            'description_en' => 'required | min:10 | max:500 | string',
            'description_ar' => 'required | min:10 | max:500 | string',
            'image' => 'required',
            'image' => 'image | mimes:png,jpg,jpeg,gif,svg | max:2048',
            'sub_image' => 'required',
            'sub_image.*' => 'image | mimes:png,jpg,jpeg,gif,svg',
            'old_price' => 'required',
            'current_price' => 'required',
            'status' => 'required',
            'amount' => 'required | integer',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_en.required' => trans('validation.required'),
            'name_en.min' => trans('validation.min'),
            'name_en.max' => trans('validation.max'),
            'name_en.string' => trans('validation.string'),

            'name_ar.required' => trans('validation.required'),
            'name_ar.min' => trans('validation.min'),
            'name_ar.max' => trans('validation.max'),
            'name_ar.string' => trans('validation.string'),

            'description_en.required' => trans('validation.required'),
            'description_en.min' => trans('validation.min'),
            'description_en.max' => trans('validation.max'),
            'description_en.string' => trans('validation.string'),

            'description_ar.required' => trans('validation.required'),
            'description_ar.min' => trans('validation.min'),
            'description_ar.max' => trans('validation.max'),
            'description_ar.string' => trans('validation.string'),

            'image.required' => trans('validation.required'),
            'image.image' => trans('validation.image'),
            'image.mimes' => trans('validation.mimes'),

            'sub_image.required' => trans('validation.required'),
            'sub_image.image' => trans('validation.image'),
            'sub_image.mimes' => trans('validation.mimes'),

            'old_price.required' => trans('validation.required'),
            'old_price.integer' => trans('validation.integer'),

            'current_price.required' => trans('validation.required'),
            'current_price.integer' => trans('validation.integer'),

            'status.required' => trans('validation.required'),

            'amount.required' => trans('validation.required'),
            'amount.integer' => trans('validation.integer'),

            'category_id.required' => trans('validation.required'),
        ];
    }
}
