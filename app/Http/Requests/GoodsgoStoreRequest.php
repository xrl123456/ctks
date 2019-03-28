<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsgoStoreRequest extends FormRequest
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
             'gname'=>'required',
            'price'=>'required|regex:/^[\d]{1,8}$/',
            'goodsNum'=>'required|regex:/^[\d]{1,8}$/',
            'tid'=>'required',
            'goodsinfo'=>'required'
            // 'pic'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'gname.required'=>'商品名不能为空',
        'price.regex'=>'商品价格格式不正确',
        'price.required'=>'商品价格不能为空',
        'tid.required'=>'商品分类不能为空',
        'goodsNum.required'=>'商品库存不能为空',
        'goodsNum.regex'=>'商品库存格式不正确',
        'goodsinfo.required'=>'商品描述不能为空',
        ];
    }
}
