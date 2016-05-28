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
        $data = $request->except('_token');

        //$article_id = $data['article_id'];
        $data['user_id'] = session('fid');
        
        $res = DB::table('comments')->insert($data);
        if($res){
            return back()->with('success','评论成功');
        }else{
            return back()->with('error','评论添加失败');
        }

    }

   

    
}
