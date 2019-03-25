<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuanliStoreRequest extends FormRequest
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
            'name'=>'required',
            'desc'=>'required',
            //'logo'=>'required';
            'filing'=>'required',
            'phone'=>'required',
            'statu'=>'required',
            'url'=>'required',
            'cright'=>'required',

            ];
    }
    public function messages()
    {
        return [
            'name.required'=>'网站管理名称不能为空',
            'desc.required'=>'描述不能为空',
            //'logo.required'=>'logo不能为空',
            'filing.required'=>'备案号不能为空',
            'phone.required'=>'电话不能为空',
            'statu.required'=>'状态不能为空',
            'url.required'=>'地址不能为空',
            'cright.required'=>'操作不能为空',
            ];
    }
}
