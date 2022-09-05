<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'username' => 'required | min:5 | max:50 | string',
            'email' => 'required | email',
            'password' => 'required | min:8 | max:20 | string',
            'role' => 'required',
            'avatar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => trans('validation.required'),
            'username.min' => trans('validation.min'),
            'username.max' => trans('validation.max'),
            'username.string' => trans('validation.string'),

            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'email.email' => trans('validation.email'),
            'email.string' => trans('validation.string'),

            'password.required' => trans('validation.required'),
            'password.min' => trans('validation.min'),
            'password.max' => trans('validation.max'),
            'password.string' => trans('validation.string'),

            'role.required' => trans('validation.required'),

            'avatar.required' => trans('validation.required'),
        ];
    }

}
