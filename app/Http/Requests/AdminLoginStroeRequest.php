<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginStroeRequest extends FormRequest
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
              //姓名需要以字母开头数字
                'name' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,15}$/',
            'password' => 'required|regex:/^[\w]{6,16}$/',
            
        ];
    }
    public function messages()
    {
        return [
           'name.required' => '用户名不能为空',
                'name.regex' => '字母开头可以混合数字 6-16位',
     
         'password.required' => '密码不能为空',
         'password.regex' => '密码格式不正确',
  
        ];
    }
}