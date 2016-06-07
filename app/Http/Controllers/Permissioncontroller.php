<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Permissioncontroller extends Controller
{
    /**
     * 添加权限页面
     */
    public function getAdd()
    {
        return view('Permission.add');
    }

    /**
     * 添加权限操作
     */
    public function postInsert(Request $request)
    {
        // dd($request->all());
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description =  $request->description;

        if($permission->save()){
            return redirect('/Permission/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 权限列表页
     */
    public function getIndex(Request $request)
    {
        $per = Permission::where(function($query) use ($request){
                            $query->where('display_name','like','%'.$request->input('username').'%');
                        })
                        ->paginate($request->input('num',10));
        return view('Permission.index',['per'=>$per,'request'=>$request->all()]);
    }

    /**
     * 绑定角色权限页
     */
    public function getAttach(Request $request)
    {
        $role_id = $request->input('role_id');//角色ID

        $role = Role::all();
        $per = Permission::all();
        return view('Permission.attach',['role'=>$role,'per'=>$per,'role_id'=>$role_id]);
    }

    /**
     * 角色权限绑定操作
     */
    public function postAttachper(Request $request)
    {
        $rol = Role::find($request->input('role_id'));//获取要绑定权限的角色
        // dd($request->input('per_id'));
        $rol->attachPermissions($request->input('per_id'));

         return redirect('/Role/index')->with('success','绑定成功');
    }

    /**
     * 权限的修改页面
     */
    public function getEdit(Request $request)
    {
        $per = Permission::find($request->input('id'));
        return view('Permission.Edit',['per'=>$per]);
    }

   /**
    * 权限的修改操作
    */
   public function postUpdate(Request $request)
   {
        // dd($request->all());
        $per = Permission::find($request->input('id'));
        $per->name = $request->name;
        $per->display_name = $request->display_name;
        $per->description = $request->description;

        if($per->save()){
            return redirect('/Permission/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
   }

   /**
    * 权限的删除操作
    */
   public function getDelete(Request $request)
   {
        // dd($request->all());
        $per = Permission::find($request->input('id'));

        if($per->delete()){
            return redirect('/Permission/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');

        }
   }


}
