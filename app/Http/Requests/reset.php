<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class reset extends Request
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
            'password'=>'required|regex:/\S{6,18}/',
            'repassword'=>'same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repassword.same'=>'两次输入的密码不一致'

        ];
    }
}
