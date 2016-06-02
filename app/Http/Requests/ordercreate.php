<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ordercreate extends Request
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
            //
            'address'=>'required',
            'zhifu'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'address.required'=>'请选择一个收货地址',
            'zhifu.required'=>'请选择一个支付方式'
        ];
    }
}
