<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Config;

class goodscontroller extends Controller
{
    /**
     * 商品添加页面 
     */
    public function getAdd()
    {
        $cate = goodscatecontroller::getCate();
        return view('goods.add',['cate'=>$cate]);
    }

    /**
     * 商品添加操作
     */
    public function postInsert(Request $request)
    {
        //实例化模型
        // dd($request->all());
        $goods = new Goods;

        $data = $request->all();
        $path='';
        //文件上传
        if($request->hasFile('pic')){
            foreach($data['pic'] as $k=>$v){

                $filename = md5(time().rand(1111,9999)).'.'.$data['pic'][$k]->getClientOriginalExtension();
                $data['pic'][$k]->move(Config::get('app.upload_dir'),$filename);

                $paths = trim(Config::get('app.upload_dir').$filename,'.');
                $path.=$paths.',';
            }
            
            
            //$filename = md5(time().rand(1111,9999)).'.'.$request->file('pic')->getClientOriginalExtension();
            //$request->file('pic')->move(Config::get('app.upload_dir'),$filename);

           $goods->pic = rtrim($path,',');  

        }
        
        $goods->title = $request->title;
        $goods->price = $request->price;
        $goods->kucun = $request->kucun;
        $goods->cate_id = $request->cate_id;
        $goods->content = $request->content;
        $goods->color = implode(',',$request->color);
        $goods->size = implode(',',$request->size);
        
        
        if($goods->save()){
            return redirect('/admins/goods/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        };
    }

    /**
     * 商品列表页
     */
    public function getIndex(Request $request)
    {
        $goods = Goods::orderBy('id','desc')
                ->where(function($query) use ($request){
                    $query->where('title','like','%'.$request->input('username').'%');
                })
                ->paginate($request->input('num',10));

        return view('goods.index',['goods'=>$goods,'request'=>$request->all()]);
    }

    /**
     * 商品修改页
     */
    public function getEdit($id)
    {
        //商品分类
        $cate = goodscatecontroller::getCate();
        //通过id查询商品信息
        $goods = Goods::findOrFail($id);

        return view('goods.Edit',['cate'=>$cate,'goods'=>$goods]);
    }

    /**
     * 商品修改操作
     */
    public function postUpdate(Request $request)
    {
        $goods = Goods::find($request->input('id'));

        $data = $request->all();
        $path='';
        if($request->hasFile('pic')){
           // unlink('.'.$goods['pic']);
            foreach($data['pic'] as $k=>$v){

                $filename = md5(time().rand(1111,9999)).'.'.$data['pic'][$k]->getClientOriginalExtension();
                $data['pic'][$k]->move(Config::get('app.upload_dir'),$filename);

                $paths = trim(Config::get('app.upload_dir').$filename,'.');
                $path.=$paths.',';
            }
            // $filename = md5(time().rand(1111,9999)).'.'.$request->file('pic')->getClientOriginalExtension();
            // $request->file('pic')->move(Config::get('app.upload_dir'),$filename);
            // $goods->pic = trim(Config::get('app.upload_dir').$filename,'.');  
            $goods->pic = rtrim($path,',');  
          
        }
        
        $goods->title = $request->title;
        $goods->price = $request->price;
        $goods->kucun = $request->kucun;
        $goods->cate_id = $request->cate_id;
        $goods->content = $request->content;
        $goods->color = implode(',',$request->color);
        $goods->size = implode(',',$request->size);
        
        
        if($goods->save()){
            return redirect('/admins/goods/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 商品的删除
     */
    public function getDelete($id)
    {
        $goods = Goods::find($id);
        foreach(explode(',',$goods['pic']) as $k=>$v){
             unlink('.'.$v);
        }
       
        if($goods->delete()){

            return redirect('/admins/goods/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        };
    }

    /**
     * 前台商品详情页
     */

    public function show($id)
    {
        //查询商品表所有信息和商品分类表里的name字段
        $goods = Goods::join('goodscates','goodscates.id','=','goods.cate_id')
                ->select('goodscates.name','goods.*')
                ->findOrFail($id);
        //颜色和尺寸
        $color = explode(',',$goods['color']);
        $size = explode(',',$goods['size']);

        //同类商品
        $guanLgoods = Goods::where('cate_id',$goods['cate_id'])->limit(4)->get(); 

        return view('goods.show',[
            'goods'=>$goods,
            'color'=>$color,
            'size'=>$size,
            'guanLgoods'=>$guanLgoods
            ]);
    }

    /**
     * 商品列表页
     */
    public function listshow(Request $request)
    {
        $data = Goods::where(function($query) use ($request){
            
                    if($request->has('cate')){
                        $query->where('cate_id',$request->input('cate'));
                    }

                    $query->where('title','like','%'.$request->input('keyword').'%');
                })
                ->select('Goods.*','goodscates.name')
                ->join('goodscates','Goods.cate_id','=','goodscates.id')
                ->paginate($request->input('num',10));

        return view('goods.listshow',['data'=>$data,'request'=>$request->all()]);
    }

}
