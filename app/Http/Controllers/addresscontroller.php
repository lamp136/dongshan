<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\yzaddress;
class addresscontroller extends Controller
{
    /**
     * 地址的添加
     */
    public function insert(yzaddress $request)
    {

        $address = new address();

        $address->sheng = $request->sheng;
        $address->shi = $request->shi;
        $address->xian = $request->xian;
        $address->jiedao = $request->jiedao;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->user_id = session('fid');

        if($address->save()){
             //dd($request->session()->all());
            return back();
        }else{
            return back();
        }
    }


}
