<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinksStoreRequest extends FormRequest
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
              //链接验证
                'lname' => 'required|unique:links',//|regex:/^\W{2,20}$/',
                'lurl' => 'required|regex:/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/',
                // 'password2'=> 'required', // |same:password',
                // 'email' => 'required', // |email',
                  // 'phone' => 'required', // |regex:/^[1]{1}[3-9]{1}[\d]{9}$/',
                  // 'status'=> 'required',  
        ];
    }
    public function messages()
    {
        return [
            'lname.required' => '链接名不能为空',
            'lname.unique' => '链接名已存在',
            // 'lname.regex' => '名字格式错误',
            // 'lname.unique' => '名字错误',
            // 'lname.same' => '名字格式错误',

            'lurl.required' => '链接地址不能为空',
            'lurl.regex' => '链接格式不正确',
           
                // 'name.unique'=>'用户名已存在',

        ];
    }
}