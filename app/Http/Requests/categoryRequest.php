<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class categoryRequest extends FormRequest
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
            'title_en' => 'required | min:5 | max:200 | string',
            'title_ar' => 'required | min:5 | max:200 | string',
            'description_en' => 'required | min:10 | max:500 | string',
            'description_ar' => 'required | min:10 | max:500 | string',
            'status' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title_en.required' => trans('validation.required'),
            'title_en.min' => trans('validation.min'),
            'title_en.max' => trans('validation.max'),
            'title_en.string' => trans('validation.string'),

            'title_ar.required' => trans('validation.required'),
            'title_ar.min' => trans('validation.min'),
            'title_ar.max' => trans('validation.max'),
            'title_ar.string' => trans('validation.string'),

            'description_en.required' => trans('validation.required'),
            'description_en.min' => trans('validation.min'),
            'description_en.max' => trans('validation.max'),
            'description_en.string' => trans('validation.string'),

            'description_ar.required' => trans('validation.required'),
            'description_ar.min' => trans('validation.min'),
            'description_ar.max' => trans('validation.max'),
            'description_ar.string' => trans('validation.string'),

            'status.required' => trans('validation.required'),

            'image.required' => trans('validation.required'),
        ];
    }
}
