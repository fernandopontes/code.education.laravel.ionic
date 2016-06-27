<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class AdminClientEditRequest extends Request
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Input::get('id'),
            'password' => 'min:6|confirmed',
            'phone' => 'required|min:6',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
        ];
    }
}
