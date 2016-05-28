<?php

namespace App\Http\Controllers;
use App\Models\Goods;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class layoutcontroller extends Controller
{
    /**
     * 文章页面导航
     */
    public static function header()
    {
        $fenlei = fenleicontroller::getCateByPid(0);
        return view('moban.header',['fenlei'=>$fenlei]);
    }

    /**
     * 右侧信息
     */
    public static function right()
    {
        //获取顶级类
        $firstclass = fenleicontroller::getFirst();
        //获取文章host字段信息
        $host = DB::table('article')->where('host',1)->orderBy('id','desc')->limit(5)->get();
        //获取最新添加的文章
        $newartic = DB::table('article')->orderBy('id','desc')->limit(5)->get();

        //解析模板
        return view('moban.right',[
                'firstclass'=>$firstclass,
                'host'=>$host,
                'newartic'=>$newartic
            ]);
    } 

    /**
     * 商品页面的导航
     */
    public static function goodsheader()
    {
        $fenlei = goodscatecontroller::getCateByPid(0);
        return view('moban.goodsheader',['fenlei'=>$fenlei]);
    }

    public static function goodsright()
    {
        //获取顶级类
        $firstclass = goodscatecontroller::getFirst();
        //字段信息
        $host = Goods::where('status',0)->orderBy('id','desc')->limit(5)->get();
        //获取最新添加的
        $newartic = Goods::orderBy('id','desc')->limit(5)->get();

        //解析模板
        return view('moban.goodsright',[
                'firstclass'=>$firstclass,
                'host'=>$host,
                'newartic'=>$newartic
            ]);
    }
}
