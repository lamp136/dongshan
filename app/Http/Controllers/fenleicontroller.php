<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class fenleicontroller extends Controller
{
    
    /**
     * 递归分类用于前台显示
     */
    public static function getCateByPid($pid)
    {
        

        $res = DB::table('fenlei')->where('pid','=',$pid)->get();
        $data =[];
        foreach ($res as $key => $value){
           
             $value['sub']= self::getCateByPid($value['id']);
             $data[] =$value;
        }
        
          return $data;
    }


    /**
     * 分类的排序
     */
     public static function getCate(){
         $res = DB::table('fenlei')
         ->select(DB::raw("name,status,id,pid,path,concat(path,',',id) as paths"))
         ->orderBy('paths')
         ->get();

         // foreach($res as $k=>$v){
         //    $temp = explode(',',$v['path']);
         //    $len = count($temp) - 1;
         //    $res[$k]['name'] = str_repeat('|---',$len).$v['name'];
         //    // var_dump($res);
         // }

         foreach($res as $k=>$v){
            $num = substr_count($v['path'],',');
            $res[$k]['name'] = str_repeat('|---',$num).$v['name'];

         }
    
          return $res;
     }

    /**
     * 添加分类
     */
    public function getAdd($id='')
    {
        
        //获取数据
         $data = self::getCate();
        return view('fenlei.add',['cate'=>$data,'id'=>$id]);
    }

    /**
     * 插入分类数据 
     */
    public function postInsert(Request $request)
    {
        $data = array();
        $pid = $request->input('pid');
        
        if($pid==0){//顶级分类
            $data = $request->only('name','pid');
            $data['path'] = "0";    
        }else{//子类
            $res = DB::table('fenlei')->where('id',$pid)->first();
            $data = $request->only('name');
            $data['path'] = $res['path'].','.$res['id'];
            $data['pid'] = $res['id'];
        }

        //添加数据
        $res = DB::table('fenlei')->insert($data);

        //判断
        if($res){
            return redirect('/admins/fenlei/index')->with('success','添加成功');
        }else{
            return back()->with('error');
        }

    }

    /**
     * 分类列表页
     */
    public function getIndex()
    {
        
        
        $data = self::getCate();
        return view('fenlei.index',['cate'=>$data]);
    }

    /**
     * 分类修显示改页
     */
    public function getEdit($id)
    {
        $res = DB::table('fenlei')->where('id',$id)->first();
        $name = $res['name'];
        $paths = $res['pid'];
       $id = $res['id'];
        $data = self::getCate();

        return view('fenlei.Edit',['cate'=>$data,'name'=>$name,'paths'=>$paths,'id'=>$id]);
    } 

    /**
     * 分类修改页
     */
    public function postUpdate(Request $request)
    {
        
        $pid = $request->input('pid');
        $data = array();
        
        //做判断
        if($pid==0){
            $data = $request->only('name','pid');
            $data['path'] = "0";
        }else{
            $res = DB::table('fenlei')->where('id',$pid)->first();
            
            $data = $request->only('name');
            $data['pid'] = $pid;
            $data['path'] = $res['path'].','.$pid;
            
        }

        $res = DB::table('fenlei')->where('id',$request->input('id'))->update($data);
        if($res){
            return redirect('/admins/fenlei/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 删除分类
     */
    public function getDelete($id)
    {
        $res = DB::table('fenlei')->select('pid')->get();
         
         // var_dump($res);die;
        foreach($res as $k=>$v){
            // var_dump($res[$k]['pid']);
                // $num = substr_count($res[$k]['pid'],$id);       
            if($res[$k]['pid']==$id){
                return back()->with('error','不是终极类');
            }
        }

        $del = DB::table('fenlei')->where('id',$id)->delete();
        if($del){
           return redirect('/admins/fenlei/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
      
    }

}
