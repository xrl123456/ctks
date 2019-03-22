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
            'price'=>'required',
            'goodsNum'=>'required',
            'tid'=>'required',
            'goodsinfo'=>'required'
            // 'pic'=>'required',
        ];
    }
    public function messages()
    {
        return [
        'gname.required'=>'商品名不能为空',
        
        'price.required'=>'商品价格不能为空',
        'tid.required'=>'商品分类不能为空',
        'goodsNum.required'=>'商品库存不能为空',
        'goodsinfo.required'=>'商品描述不能为空',
        ];
    }
}
