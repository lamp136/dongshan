<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class commentcontroller extends Controller
{
    /**
     * 评论添加
     */
    public function insert(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token');

        //$article_id = $data['article_id'];
        $data['user_id'] = session('fid');
        $data['path'] = '0';
        $data['time'] = date('Y-m-d H:i:s');

        $res = DB::table('comments')->insert($data);
        if($res){
            return back()->with('success','评论成功');
        }else{
            return back()->with('error','评论添加失败');
        }

    }

    /**
     * 回复留言
     */
    public function message(Request $request)
    {
         //dd($request->all());
        $data = $request->except('_token');

        $res = DB::table('comments')->where('id',$data['pid'])->first();

        $data['path'] = $res['path'].','.$res['id'];
        $data['user_id'] = session('fid');
        $data['time'] = date('Y-m-d H:i:s');
        
        $default = DB::table('comments')->insert($data);

        if($default){
            return back()->with('success','评论成功');
        }else{
            return back()->with('error','评论添加失败');
        }
    }

   

    
}
