<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class StoreClassifiedRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user()) return true;
        return false;
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
            'title' => 'required|string',
            'price' => 'required|min:0.01|numeric',
        ];
    }
}
