<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BbsfenStoreRequest extends FormRequest
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
            //'status'=>'required',
            'cname'=>'required',
            //'content'=>'required',
            //'cates'=>'required',

            ];
    }
    public function messages()
    {
        return [
            //'status.required'=>'状态不能为空',
            'cname.required'=>'分类名称不能为空',
            //'content.required'=>'内容不能为空',
            //'cates.required'=>'分类不能为空',
            ];
    }
}
