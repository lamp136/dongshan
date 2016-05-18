<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class usercontroller extends Controller
{
    /**
     * 用户的添加操作
     */
    public function getAdd(){
        return view('user.add');
    }

    /**
     * 用户的插入操作
     */
    public function postInsert(Request $request){
        // dd($request->all());
        $this->validate($request, [
        'username' => 'required',
        'password' => 'required',
        'repassword'=> 'required|same:password',
        'email' => 'required|email'
        ], [
        
        'username.required' =>' 用户名不能为空',
        'password.required' => '密码不能为空',
        'repassword.required' => '确认密码不能为空',
        'repassword.same' => '两次输入的密码不一致',
        'email.required' => '邮箱不能为空',
        'email.email' => '邮箱格式不正确',
    ]);

        //获取数据
        $data = $request->only(['username','password','email']);
        //给密码加密
        $data['password'] = Hash::make($data['password']);
        // dd($data);
        //设置token
        $data['token'] = str_random(50);//50位的随机字符串
    
        $res = DB::table('useradd')->insert($data);

        if($res){
            return redirect('/admins/user/index/')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 用户列表页
     */
    public function getIndex(Request $request){

        // if($request->input('username')){
        //      $res = DB::table('useradd')
        //     ->paginate($request->input('num',10))
        //     ->where('username','like','%a%');
        // }else{
        //     $res = DB::table('useradd')
        //     ->paginate($request->input('num',10));
        // }

        $res = DB::table('useradd')
                ->where(function($query) use ($request){
                    $query->where('username','like','%'.$request->input('username').'%');
                })
                ->paginate($request->input('num',10));
       
        return view('user.index',['user'=>$res,'request'=>$request->all()]);
    }

    /**
     * 用户的修改
     */
    public function getEdit($id){
        
        $res = DB::table('useradd')->where('id',$id)->first();

        return view('user.Edit',['userinfo'=>$res]);
    }

    /**
     * 用户的修改
     */
    public function postUpdate(Request $request){
        $this->validate($request, [
        'username' => 'required',
        'email' => 'required|email'
        ], [
        
        'username.required' =>' 用户名不能为空',
        'email.required' => '邮箱不能为空',
        'email.email' => '邮箱格式不正确',
    ]);

        //获取数据
        $data = $request->only('username','email');
        //修改
        $res = DB::table('useradd')->where('id','=',$request->input('id'))->update($data);

        if($res){
            return redirect('/admins/user/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 用户删除操作
     */
    public function getDelete($id)
    {
        $res = DB::table('useradd')->where('id','=',$id)->delete();
        if($res){
            return redirect('/admins/user/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    
}
