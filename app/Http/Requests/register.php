<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class register extends Request
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
            "email"=>'required|email',
            "password"=>"required|regex:/\S{6,18}/",
            "repassword"=>"required|same:password"

        ];
    }

    public function messages()
    {
        return [
            "email.required"=>"邮箱不能为空",
            "email.email" => "邮箱格式不正确",
            "password.required" => "密码不能为空",
            "password.regex" => "密码格式不正确",
            "repassword.required" => "确认密码不能为空",
            "repassword.same" => "两次输入的密码不一致"
        ];
    }
 
}
