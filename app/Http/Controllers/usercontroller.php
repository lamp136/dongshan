<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Role;
use App\User;
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
                //关联roles表和role_user表
                ->select('useradd.*','roles.display_name','role_user.*')
                ->leftjoin('role_user','role_user.user_id','=','useradd.id')
                ->leftjoin('roles','role_user.role_id','=','roles.id')
                //分页操作
                ->paginate($request->input('num',10));

       
        return view('user.index',['user'=>$res,'request'=>$request->all()]);
    }

    /**
     * 用户的修改页
     */
    public function getEdit(Request $request){
        $id = $request->input('id');//用户的id

        //获取role_user里的role_id
        $role_id = $request->input('role_id');

        //获取要修改角色名
        $display = $request->input('rol');
        $rol = Role::all();//查询所有角色

        $res = DB::table('useradd')->where('id',$id)->first();

        return view('user.Edit',['userinfo'=>$res,'role'=>$rol,'display'=>$display,'role_id'=>$role_id]);
    }

    /**
     * 用户的修改操作
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

        //获取修改页更改后的角色的ID
        $role = [];
        $role['role_id']= $request->input('role_id');

        //首页传过来的要修改的角色ID
        $old_role_id = $request->input('old_role_id');


        //修改用户
        $res = DB::table('useradd')->where('id','=',$request->input('id'))->update($data);

        //修改用户角色  
        $null = DB::table('role_user')->where('user_id',$request->input('id'))->where('role_id',$old_role_id)->update($role);


        if($res||$null){
            return redirect('/admins/user/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 用户删除操作
     */
    public function getDelete(Request $request)
    {
        $id = $request->input('id');
        $res = DB::table('useradd')->where('id','=',$id)->delete();

        //删除用户下的所有角色
        $rol = DB::table('role_user')->where('user_id',$id)->delete();

        if($res){
            return redirect('/admins/user/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    /**
     * 删除用户角色
     */
    public function getRoledel(Request $request)
    {

        $data = $request->all();//获取要删除的用户ID和角色ID

        $res = DB::table('role_user')->where('user_id',$data['uid'])->where('role_id',$data['role_id'])->delete();

        if($res){
            return redirect('/admins/user/index')->with('success','删除成功');  
        }else{
            return back()->with('error','删除失败');
        }
    }

    
}
