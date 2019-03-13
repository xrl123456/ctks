<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
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
              //姓名需要以a字母开头以数字结尾
                'name' => 'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'password' => 'required|regex:/^[\w]{6,8}$/',
            'password2'=> 'required|same:password',
               'email' => 'required|email',
               'phone' => 'required|regex:/^[1]{1}[3-9]{1}[\d]{9}$/',
               'status'=> 'required',  
        ];
    }
    public function messages()
    {
        return [
           'name.required' => '用户名不能为空',
                'name.regex' => 'a字母开头以数字结尾',
                'name.unique'=>'用户名已存在',
         'password.required' => '密码不能为空',
         'password.regex' => '密码格式不正确',
         'password2.same'=>'两次密码不一致',
        'password2.required' => '确认密码不能为空',
            'phone.required' => '手机号不能为空',
                'phone.regex' => '手机号格式不正确',
            'email.required' => '邮箱不能为空',
                'email.regex' => '邮箱格式不正确',
            'status.required'=> '级别不能为空',
        ];
    }
}
