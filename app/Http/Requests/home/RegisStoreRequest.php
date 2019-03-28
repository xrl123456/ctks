<?php

namespace App\Http\Requests\home;

use Illuminate\Foundation\Http\FormRequest;

class RegisStoreRequest extends FormRequest
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
            'phone' =>'unique:users', 
            "name"=>'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
        ];  
    }
     public function messages()
    {
         return [
          
                'name.regex' => 'a字母开头以数字结尾',
                'name.unique'=>'用户名已存在',
                'phone.unique'=>'该号码已注册',
                ];

    }
}
