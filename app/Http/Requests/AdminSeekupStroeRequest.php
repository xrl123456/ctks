<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminSeekupStroeRequest extends FormRequest
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
            'password' => 'required|regex:/^[\w]{6,16}$/',
            'repassword' => 'required|regex:/^[\w]{6,16}$/',
                   
        ];
    }
    public function messages()
    {
        return [
            'password.required' => '用户名不能为空',
            'password.regex' => '密码格式错误',
            'repassword.required' => '确认密码不能为空',
            'repassword.regex' => '密码格式错误',

  
        ];
    }
}
