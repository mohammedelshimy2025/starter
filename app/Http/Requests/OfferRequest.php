<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'name_ar' => 'required|string|max:100|unique:offers,name_ar',
            'name_en' => 'required|string|max:100|unique:offers,name_en',
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name_ar.required' => trans('messages.offer name_ar require'),
            'name_en.unique' => trans('messages.offer name_en unique'),
            'price.required' => trans('messages.offer price require'),
            'price.numeric' => trans('messages.offer price numeric'),
            'details_ar.required' => trans('messages.offer details require'),
            'details_en.required' => trans('messages.offer details require'),
            'details_ar.unique' => trans('messages.offer details_ar unique'),
            'details_en.unique' => trans('messages.offer details_en unique'),
        ];
    }
}
