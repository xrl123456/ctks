<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsleStoreRequest extends FormRequest
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
            'cname'=>'required|unique:goods_type',
        ];
    }
    public function messages()
    {
        return [
            'cname.required' => '类名不能为空',
            'cname.unique' => '该类名已存在',

        ];
    }
}
