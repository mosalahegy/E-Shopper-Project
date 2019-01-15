<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'          =>  'required|min:5|max:199',
            'description'   =>  'required',
            'approve'       =>  'required',
            'price'         =>  'required|numeric',
            'status'        =>  'required',
            'rating'        =>  'required',
            'productImage'  =>  'image|mimes:jpg,png,jpeg',
            'country'       =>  'required|min:5|max:199',
            'quantity'      =>  'required|numeric',
            'category_id'   =>  'required'
        ];
    }
}
