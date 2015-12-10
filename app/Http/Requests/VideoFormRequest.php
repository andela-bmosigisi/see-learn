<?php

namespace Learn\Http\Requests;

class VideoFormRequest extends Request
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
            'title' => 'required|max:60',
            'description' => 'required|min:6|max:200',
            'link' => 'required|url|min:15|max:60|regex:/youtube/',
        ];
    }
}
