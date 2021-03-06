<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuperStoreRequest extends FormRequest
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
                'name' => 'required|unique:supers|regex:/^[a-zA-Z]{1}[\w]{5,15}$/',
            'password' => 'required|regex:/^[\w]{6,8}$/',
            'password2'=> 'required|same:password',
               'email' => 'required|email',
               'phone' => 'required|regex:/^[1]{1}[3-9]{1}[\d]{9}$/',
               'grade'=> 'required',  
        ];
    }
    public function messages()
    {
        return [
           'name.required' => '用户名不能为空',
                'name.regex' => '字母开头可以混合数字 6-15位',
                'name.unique'=>'用户名已存在',
         'password.required' => '密码不能为空',
         'password.regex' => '密码格式不正确',
         'password2.same'=>'两次密码不一致',
        'password2.required' => '确认密码不能为空',
            'phone.required' => '手机号不能为空',
                'phone.regex' => '手机号格式不正确',
            'email.required' => '邮箱不能为空',
                'email.regex' => '邮箱格式不正确',
            'grade.required'=> '级别不能为空',
        ];
    }
}