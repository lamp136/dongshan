<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use DB;
use App\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Rolecontroller extends Controller
{
    /**
     * 角色添加页面
     */
    public function getAdd()
    {
        return view('Role.add');
    }

    /**
     * 角色的插入操作
     */
    public function postInsert(Request $request)
    {
        $role = new Role();
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;

        if($role->save()){
            return redirect('/Role/index')->with('success','角色添加成功');
        }else{
            return back()->with('error','添加角色失败');
        }
    }

    /**
     * 角色的列表页
     */
    public function getIndex(Request $request)
    {
        // $role = Role::select('roles.name','roles.display_name','roles.description','permissions.display_name as per_name','permissions.id')
        //         ->rightjoin('permission_role','roles.id','=','permission_role.role_id')
        //         ->rightjoin('permissions','permission_role.role_id','=','permissions.id')
        //         ->get();

         $role = Permission::where(function($query) use ($request){
                    $query->where('roles.name','like','%'.$request->input('username').'%');
                })
                ->select('roles.*','permissions.display_name as per_name','permissions.id as per_id')
                ->rightjoin('permission_role','permissions.id','=','permission_role.permission_id')
                ->rightjoin('roles','permission_role.role_id','=','roles.id')
                ->paginate($request->input('num',10));

        // dd($role);
        return view('Role.index',['role'=>$role,'request'=>$request->all()]);
    }

    /**
     * 角色的修改页面
     */
    public function getEdit(Request $request)
    {
        // dd($request->all());
        $role = Role::find($request->input('id'));//角色ID
        $pod = $request->input('pod');//要修改的权限ID
        
        $per = Permission::all();

        return view('Role.Edit',['role'=>$role,'pod'=>$pod,'per'=>$per]);
    }

    /**
     * 角色的修改操作
     */
    public function postUpdate(Request $request)
    {
        // dd($request->all());
        //定义空数组,获取修改页修改后的权限ID
        $data =[];
        $data['permission_id'] = $request->input('per_id');


        //修改角色操作
        $role = Role::find($request->input('id'));
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;

        //修改权限操作
        //如果修改后的权限id,per_id不等于首页传过来的权限id,pod就执行更新
        if($request->input('per_id') != $request->input('pod')){

            $res = DB::table('permission_role')
                        ->where('permission_id',$request->input('pod'))
                        ->where('role_id',$request->input('id'))
                        ->update($data);
            
        }

        if($role->save() || $res){
            return redirect('/Role/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        };
    }

    /**
     * 角色的删除操作
     */
    public function getDelete(Request $request)
    {
        $role = Role::find($request->input('id'));

        //删除该角色下的所有权限
        $res = DB::table('permission_role')->where('role_id',$request->input('id'))->delete();

        if($role->delete()){
            return redirect('/Role/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        };
    }

    /**
     * 角色权限的删除
     */
    public function getPerdel(Request $request)
    {
        // dd($request->all());
        $res = DB::table('permission_role')
                    ->where('permission_id',$request->input('pod'))
                    ->where('role_id',$request->input('id'))
                    ->delete();
        if($res){
            return redirect('/Role/index')->with('success','删除权限成功');
        }else{
            return back()->with('error','删除失败');
        }
    }   

    /**
     * 用户角色绑定页面
     */
    public function getAttach(Request $request)
    {   
        //id是用户id
        $id = $request->input('id');
        
        $role = Role::all();
        $users = User::all();
        return view('/Role/attach',['users'=>$users,'id'=>$id,'role'=>$role]);
    }

    /**
     * 用户角色绑定操作
     */
    public function postAttachrole(Request $request)
    {
        $user = User::find($request->input('user_id'));
        $role = Role::find($request->input('role_id'));

        $user->attachRole($role);
        
        return redirect('/admins/user/index')->with('success','绑定成功');    
    }



}
