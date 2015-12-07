<?php

namespace Learn\Http\Requests;

use Learn\Http\Requests\Request;

class UserProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Authorization is implemented elsewhere.
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
            'name' => 'required|min:6|max:60',
            'email' => 'required|email',
            'avatar' => 'mimes:jpeg,bmp,png',
        ];
    }
}
