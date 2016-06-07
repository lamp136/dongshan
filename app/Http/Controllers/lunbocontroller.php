<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lunbo;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class lunbocontroller extends Controller
{
    /**
     *  轮播图添加页面
     */
    public function getAdd()
    {
        return view('lunbo.add');
    }

    /**
     * 轮播轮添加操作
     */
    public function postInsert(Request $request)
    {
        $lunbo = new lunbo;
        // dd($request->all());
        if($request->hasFile('pic')){
            $picnames = md5(time().rand(1000,9999)).'.'.$request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(config('app.upload_dir'),$picnames);

            $path = trim(config('app.upload_dir').$picnames,'.');
            
            $lunbo->pic = $path;
        }

        $lunbo->picname = $request->picname;
        $lunbo->content = $request->content;

        if($lunbo->save()){
            return redirect('/lunbo/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * 轮播图列表页
     */
    public function getIndex(Request $request)
    {
        $user = lunbo::orderBy('id','desc')
                ->where(function($query) use ($request){
                    $query->where('picname','like','%'.$request->input('username').'%');
                })
                ->paginate($request->input('num',10));

        return view('/lunbo/index',['user'=>$user,'request'=>$request->all()]);
        
    }

    /**
     * 轮播图修改页
     */
    public function getEdit(Request $request)
    {
        $id = $request->input('id');
        $data = lunbo::findOrfail($id);
        return view('lunbo.Edit',['data'=>$data]);
    }

    /**
     * 轮播图修改操作
     */
    public function postUpdate(Request $request)
    {
         $lunbo = lunbo::findOrfail($request->input('id'));
        // dd($request->all());
        if($request->hasFile('pic')){
            unlink('.'.$lunbo['pic']);
            $picnames = md5(time().rand(1000,9999)).'.'.$request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(config('app.upload_dir'),$picnames);

            $path = trim(config('app.upload_dir').$picnames,'.');
            
            $lunbo->pic = $path;
        }

        $lunbo->picname = $request->picname;
        $lunbo->content = $request->content;

        if($lunbo->save()){
            return redirect('/lunbo/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除操作
     */
    public function getDelete(Request $request)
    {
        $id = $request->input('id');
        $lunbo = lunbo::findOrfail($id);
        unlink('.'.$lunbo['pic']);
        if($lunbo->delete()){
            return redirect('/lunbo/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');

        }
    }
}
