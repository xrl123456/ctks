<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSeekStroeRequest extends FormRequest
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
            'password' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,15}$/',
            'repassword' => 'required',       
        ];
    }
    public function messages()
    {
        return [
            'password.required' => '用户名不能为空',
            'password.regex' => '用户名格式或长度错误',
            'repassword.required' => '邮箱不能为空',

  
        ];
    }
}