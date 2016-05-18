<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class article extends Request
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
            'title'=>'required',
            'content'=>'required',
            'descr'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'文章标题不能为空',
            'content.required'=>'内容不能为空',
            'descr.required' => '文章描述不能为空',

        ];
    }
}
