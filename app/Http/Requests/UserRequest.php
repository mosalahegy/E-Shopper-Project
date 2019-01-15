<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
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
            //
            'name'      =>  'required|min:2|max:199',
            'email'     =>  'email|required',
            'password'  =>  'required|same:password-confirm|min:6',
            'isAdmin'   =>  'required',
            'approve'   =>  'required',
            'image'     =>  'image|mimes:jpg,png,jpeg'
        ];
    }
}
