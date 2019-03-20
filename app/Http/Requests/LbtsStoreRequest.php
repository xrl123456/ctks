<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LbtsStoreRequest extends FormRequest
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
            'simg'=>'required',
            'surl'=>'required',
            'status'=>'required',

            ];
    }
    public function messages()
    {
        return [
            'simg.required'=>'标题不能为空',
            'surl.required'=>'内容不能为空',
            'status.required'=>'内容不能为空',
            ];
    }
}
