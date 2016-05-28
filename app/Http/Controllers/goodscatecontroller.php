<?php

namespace App\Http\Controllers;
use App\goods\goodscate;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class goodscatecontroller extends Controller
{

    /**
     * 递归分类用于前台显示
     */
    public static function getCateByPid($pid)
    {
        $res = goodscate::where('pid','=',$pid)->get();
        $data =[];
        foreach ($res as $key => $value){
           
             $value['sub']= self::getCateByPid($value['id']);
             $data[] =$value;
        }
        
          return $data;
    }

    /**
     * 排序
     */
    public static function getCate()
    {
        $res = goodscate::select(DB::raw("id,name,pid,path,status,concat(path,',',id) as paths"))
            ->orderBy('paths')
            ->get(); 


        foreach($res as $k=>$v){
             $num = substr_count($v['path'],',');
             $res[$k]['name'] = str_repeat('|--',$num).$v['name'];
        }
           
        return $res;
    }
    /**
     * 商品分类的添加页面
     */
    public function getAdd($id='')
    {
        
        $cate = self::getCate();
        return view('goodscate.add',['cate'=>$cate,'id'=>$id]);
    }

    /**
     * 商品分类插入操作
     */
    public function postInsert(Request $request)
    {
        $goods = new goodscate;
        $data = $request->except('_token');
        
        if($data['pid']==0){
            $goods->path = 0;
            $goods->pid = $request->pid;
        }else{
            $res = goodscate::where('id',$data['pid'])->first();
            // $data['pid'] = $res['id'];
            // $data['path'] = $res['path'].','.$res['id'];
            $goods->pid = $res['id'];
            $goods->path= $res['path'].','.$res['id'];
        }

            $goods->name=$request->name;

            if($goods->save()){
                return redirect('/admins/cate/index')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');   
            }
        // if(DB::table('goodscates')->insert($data)){
        //     return redirect('/admins/cate/index')->with('success','添加成功');
        // }else{
        //     return back()->with('error','添加失败');
        // }

    }

    /**
     * 商品分类列表
     */
    public function getIndex()
    {
        $cate = self::getCate();
        return view('goodscate.index',['cate'=>$cate]);
    }

    /**
     * 商品分类修改页面
     */
    public function getEdit($id)
    {

         $res = goodscate::where('id',$id)->first();
         $cate = self::getCate();
        return view('goodscate.edit',['cate'=>$cate,'res'=>$res]);
    }

    /**
     * 商品分类修改操作
     */
    public function postUpdate(Request $request)
    {

        $data = $request->except('_token');
        $goods = goodscate::findOrFail($data['id']);

        if($data['pid']==0){
           
            $goods->pid = $request->pid;
            $goods->path = 0;
        }else{
            $res = goodscate::where('id',$data['pid'])->first();
    
            $goods->pid=$res['id'];
            $goods->path = $res['path'].','.$res['id'];
        }
        // dd($data);
            $goods->name = $request->name;
        if($goods->save()){
            return redirect('/admins/cate/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');

        }
    }

    /**
     * 商品分类的删除
     */
    public function getDelete($id)
    {
        $goods = goodscate::findOrFail($id);

        if(goodscate::where('pid',$id)->first()){
            return back()->with('error','该类下有子类不能删除');
        }else{
            if($goods->delete()){
                return redirect('/admins/cate/index')->with('success','删除成功');
            }else{
                return back()->with('success','删除失败');
            }
        }
    }

    /**
     * 获取一级类 
     */

    public static function getFirst()
    {
        return goodscate::where('pid',0)->get();
    }

}
