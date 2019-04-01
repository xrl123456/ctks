<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStroeRequest extends FormRequest
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
            'vname' => 'required|unique:video',

        ];
    }
    public function messages()
    {
        return [
          'vname.required' => '用户名不能为空',
           'vname.unique'=>'用户名已存在',
        ];
    }
}
