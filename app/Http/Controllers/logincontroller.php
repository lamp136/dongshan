<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginrequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Hash;
class logincontroller extends Controller
{
    /**
     * 登录显示页
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     *  登录操作页
     */
    public function dologin(loginrequest $request)
    {
        $name = $request->only('username');
        
        $res = DB::table('useradd')->where('username','=',$name)->first();
        
        //通过Hash解密对比密码
        if(Hash::check($request->input('password'),$res['password'])){
            //把ID存入session
            session(['id'=>$res['id']]);
            
            return redirect('/admins/')->with('success','登录成功');
        }else{
            return back()->with('error','登录失败');
        }
    }
}
