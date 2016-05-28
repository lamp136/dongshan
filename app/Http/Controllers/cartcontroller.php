<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class cartcontroller extends Controller
{
    /**
     * 加入购物车操作
     */
    public function insert(Request $request)
    {
        $data = $request->except('_token');

        //判断如果session中存在cart就进行过滤
        if($request->session()->has('cart')){

            //调用过滤方法
            if($this->guoL($data['id'])){
                //id不存在就压入session
                $request->session()->push('cart',$data);
             }
        }else{
            $request->session()->push('cart',$data);
        }
         
         return redirect('/cart/index')->with('success','添加成功');   
    }

    /**
     * 购物车显示页
     */
    public function index(Request $request)
    {
        $goods = session('cart');
        $data = [];
         foreach(session('cart') as $k=>$v){
           $tmp = Goods::find($v['id']);
           //数量
           $tmp['num'] = $v['num'];
           //总计
           $tmp['total'] = $v['num'] * $tmp['price'];
           $data[] = $tmp;
         }
        // dd($data);
        return view('cart.index',['data'=>$data]);
    }

    /**
     * 过滤重复的值添加到session
     */
    public function guoL($id)
    {
        foreach(session('cart') as $k=>$v){
            if($v['id'] == $id){
                return false;
            }
        }
        return true; 
    }

    /**
     * 删除购物车里商品操作
     */
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = session('cart');
        
        foreach($data as $k=>$v){

            if($v['id']==$id){
                unset($data[$k]);
                echo '1';  
            }
        }
        session(['cart'=>$data]);

        
    }

    /**
     * 清除session
     */
    public function clear(Request $request)
    {
        // $request->session()->flush();
        dd(session('cart'));
    }



}
