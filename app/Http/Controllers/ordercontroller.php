<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\address; //地址表模型
use App\Models\order;//订单表模型
use App\Models\Goods;//商品表模型
use App\Models\OrderGoods;//
use App\Http\Requests\ordercreate;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ordercontroller extends Controller
{
    /**
     * 订单表页面
     */
    public function insert(Request $request)
    {
         // dd($request->only('goods'));
        //把商品信息存入session中
        if($request->only('goods')['goods']){
            session(['order_goods'=>$request->only('goods')['goods']]);
        }
        
        // dd(session('order_goods'));
        //通过用户的id获取用户收货地址信息
        $address = address::where('user_id',session('fid'))->get();
        
        return view('order.address',['address'=>$address]);
    }

    /**
     * 订单表的插入操作
     */
    public function create(ordercreate $request)
    {

       // dd(session('order_goods'));
        // dd($this->total());
        $order = new order();

        $order->user_id = session('fid');
        $order->address_id = $request->address;
        $order->total = $this->total();
        $order->order_num = $this->ordernum();
        $order->status =  1;

        if($order->save()){
            //插入order_goods表数据
            $data=[];
            $goods=[];
             // if(empty(session('order_goods'))) return false;

            foreach(session('order_goods') as $k=>$v){
                //插入order_goods表里的内容
                $tmp['goods_id'] = $v['id'];
                $tmp['num'] = $v['num'];
                $tmp['order_id'] = $order->id;
                $data[]=$tmp;
                // dd($data);
                //获取商品的信息在前台遍历的
                $cmp = Goods::find($v['id']);
                $cmp['num'] = $v['num'];
                $cmp['total'] = $v['num'] * $cmp['price'];//商品的小计
                $goods[] = $cmp;
                
            }
            OrderGoods::insert($data);
            
            return view('order.confirm',[
                    'goods'=>$goods,
                    'address'=>$request->input('address'),
                    'zhifu'=>$request->input('zhifu'),
                    'totals'=>$order->total,//商品总计
                    'order_num'=>$order->order_num //订单号
                    ]);
        }
    }

    /**
     * 商品总价的计算
     */
    public function total()
    {
        $t= 0;
        $goods = session('order_goods');

        if($goods){
            foreach($goods as $k=>$v){
               $info = Goods::where('id',$v['id'])->first();
               $t += $v['num'] * $info['price'];
            }
        }
        return $t;
    }

    
    /**
     * 订单编号
     */
    private function ordernum()
     {
        return time().rand(1111111,9999999);
    }

}
