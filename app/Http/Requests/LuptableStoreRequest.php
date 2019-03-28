<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuptableStoreRequest extends FormRequest
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
                //姓名需要以字母开头以数字结尾
                'lname' => 'required',
                'lurl' => 'required|regex:/^https:\/\/[A-Za-z0-9]+\.[A-Za-z0-9]+[\/=\?%\-&_~`@[\]\':+!]*([^<>\"\"])*$$/',
        ];
    }

    public function messages()
    {
        return [
            'lname.required' => '链接名称不能为空',
            'lurl.required' => '链接地址不能为空',
            'lurl.regex' => '链接地址格式不正确',
        ];
    }
}
