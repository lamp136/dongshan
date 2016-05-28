<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\article;//引入表单验证类
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;
use Config; //引入配置文件图片地址类
class articlecontroller extends Controller
{
    /**
     * 后台文章添加页面
     */
   public function getAdd()
   {
        //跳转文章添加页面带分类方法过去
        return view('article.add',['fenlei'=>fenleicontroller::getCate()]);
   }

   /**
    * 后台文章添加操作
    */
   public function postInsert(article $request)
   {

        $data = $request->except('_token');
        //文件上传
        if($request->hasFile('pic')){
            //拼接文件名
            $pathname = md5(time().rand(0,999999)).'.'. $request->file('pic')->getClientOriginalExtension();
            //执行上传
            $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
            //拼接字符串
            $pic = Config::get('app.upload_dir').$pathname;
            $data['pic'] = trim($pic,'.');
        }
        $data['user_id'] = 1;
        $data['created_at'] = date('Y-m-d H:i:s');

        $res = DB::table('article')->insert($data);
        if($res){
            return redirect('/admins/article/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
   }


   /**
    * 后台文章列表页
    */
   public function getIndex(Request $request)
   {

        $data = DB::table('article')
                //搜索
                 ->where(function($query) use ($request){
                     $query->where('title','like','%'.$request->input('username').'%');
                 })
                 //分页
                ->paginate($request->input('num',10));

        //这里的reuquest->all()是所有页码
        return view('article.index',['data'=>$data,'request'=>$request->all()]);
   }

   /**
    * 后台文章修改页
    */
   public function getEdit($id)
   {
        $fenlei = fenleicontroller::getCate();
        $content = DB::table('article')->where('id','=',$id)->first();
        return view('article.Edit',['content'=>$content,'fenlei'=>$fenlei]);
   }

   /**
    * 后台文章修改操作
    */
   public function postUpdate(article $request)
   {
        $data = $request->except('_token');

        if($request->hasFile('pic')){
            
            //拼接文件名
            $pathname = md5(time().rand(0,9999)).'.'.$request->file('pic')->getClientOriginalExtension();
            //执行上传
            $request->file('pic')->move(Config::get('app.upload_dir'),$pathname);
            //拼接字符串
            $pic = Config::get('app.upload_dir').$pathname; 
            $data['pic'] = trim($pic,'.');
            $data['user_id'] = 1;
            $data['created_at'] = date('Y-m-d H:i:s');  
        }
        
            $res = DB::table('article')->where('id','=',$request->input('id'))->update($data);
            if($res){
                return redirect('/admins/article/index')->with('success','修改成功');
            }else{
                return back()->with('修改失败');
            }
   }

   /**
    *  后台文章删除操作
    */

   public function getDelete($id)
   {
    $data = DB::table('article')->where('id','=',$id)->first();
    
    if($data['pic']){
        unlink('.'.$data['pic']);
    }
     $res = DB::table('article')->where('id','=',$id)->delete();
     if($res){
        return redirect('/admins/article/index')->with('success','删除成功');
     }else{
        return back()->with('error','删除失败');
     }
   }


   /**
    * 文章详情页
    */
   public function show($id)
   {
    //通过联合查询
      $res = DB::table('article')
            ->where('article.id',$id)
            ->select('article.*','useradd.username','fenlei.name')
            ->join('useradd','article.user_id','=','useradd.id')
            ->join('fenlei','article.cate_id','=','fenlei.id')
            ->first();
          

      //文章评论
      $comment = DB::table('comments')
                ->where('article_id',$id)
                ->select('comments.*','useradd.username')
                ->join('useradd','comments.user_id','=','useradd.id')
                ->get();

      //这里的操作在moban.right里实现了
       //获取一级类
     //  $firstclass = fenleicontroller::getFirst();
      
       //获取推荐文章
     //  $host = DB::table('article')->where('host',1)->orderBy('id','desc')->limit(5)->get();
     
      //最近发布的文章
     //  $newartic = DB::table('article')->orderBy('id','desc')->limit(5)->get();

      return view('article.show',[
                'res'=>$res,
                'comment'=>$comment
              ]);

   }

   /**
    * 前台文章列表页
    */
   public function listshow(Request $request)
   {
      $data = DB::table('article')
              ->where(function($query) use ($request){
                  //分类显示
                  if($request->has('cate')){
                    $query->where('cate_id',$request->input('cate'));
                  }
                  //搜索条件
                  $query->where('title','like','%'.$request->input('keyword').'%');
              })
              ->select('article.*','useradd.username','fenlei.name')
              ->join('useradd','article.user_id','=','useradd.id')
              ->join('fenlei','article.cate_id','=','fenlei.id')
              ->paginate(5);

      

      return view('article.listshow',['data'=>$data,'request'=>$request->all()]);
   }
}
