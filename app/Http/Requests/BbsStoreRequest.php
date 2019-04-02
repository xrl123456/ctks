<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BbsStoreRequest extends FormRequest
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
        //$bbs->status=$request->input('status','1');
        //$bbs->name=$request->input('name','');
        //$bbs->content=$request->input('content','');
        //$bbs->cates=$request->input('cates','');
   public function rules()
    {
        return [
            //
            'status'=>'required',
            'name'=>'required',
            'content'=>'required',
            'cates'=>'required',

            ];
    }
    public function messages()
    {
        return [
            'status.required'=>'状态不能为空',
            'name.required'=>'标题不能为空',
            'content.required'=>'内容不能为空',
            'cates.required'=>'分类不能为空',
            ];
    }
}
