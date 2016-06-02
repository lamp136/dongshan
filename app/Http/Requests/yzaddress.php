<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class yzaddress extends Request
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
            'name'=>'required',
            'phone'=>'required|regex:/^\d{8,11}$/',
            'sheng'=>'required',
            'shi'=>'required',
            'xian'=>'required',
            'jiedao'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'收件人不能为空',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号格式不正确',
            'sheng.required'=>'请填写省份',
            'shi.required'=>'请填写市',
            'xian.required'=>'请填写县',
            'jiedao.required'=>'请填写详细地址'
        ];
    }
}
