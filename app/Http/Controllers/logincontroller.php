<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginrequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use Illuminate\Contracts\Encryption\DecryptException;
use Hash;
use App\Http\Requests\register;
use App\Http\Requests\reset;
class logincontroller extends Controller
{
    /**
     * 登录显示页
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     *  登录操作页
     */
    public function dologin(loginrequest $request)
    {
        $name = $request->only('username');
        
        $res = DB::table('useradd')->where('username','=',$name)->first();
        
        //通过Hash解密对比密码
        if(Hash::check($request->input('password'),$res['password'])){
            //把ID存入session
            session(['id'=>$res['id']]);
            $request->session()->put('name',$res['username']);
            
            

            return redirect('/admins/')->with('success','登录成功');
        }else{
            return back()->with('error','登录失败');
        }
    }
     
    /**
      * 后台退出登录操作
      */ 
   public function dologout(Request $request)
   {
         $request->session()->forget('id');
        
         return redirect('/admins/login');
   }

    
    /**
     * 前台注册页面
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * 前台注册操作
     */
    public function doregister(register $request)
    {
        if(session('vcode') != $request->input('vcode')){
            return back()->with('error','验证码错误');
        }


        $data = $request->only('email');
        $data['password'] = Hash::make($request->input('password'));
        $data['token'] = str_random(50);

        $id = DB::table('useradd')->insertGetId($data);

        if($id){
            //调用发送邮件的方法
            $this->sendjihuo($data['email'],$id,$data['token']);
            return view('login.success');

        }else{
            return back()->with('error','注册失败');
        }
    }

    /**
     * 发送邮件操作
     */
    private function sendjihuo($email,$id,$token)
    {
        //解析模板
        Mail::send('email.jihuo',['id'=>$id,'token'=>$token], function ($message) use ($email) {
        $message->to($email)->subject('激活账号');

        });

        //原始字符串
        // Mail::raw('点击以下连接,来激活您的账号<a href="http://www.app.com/jihuo?id='.$id.'&token='.$token.'"></a>',function($message) use ($email){
        //     $message->to($email);
        //     $message->subject('激活账号');
        // });
    }

    /**
     * 账号激活操作
     */
    public function jihuo(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('useradd')->where('id','=',$id)->first();

        //如果返回的token值和数据库的token值一样就修改status为2
        if($request->input('token') == $data['token']){
            //修改状态
            $tmp['status'] = '2';
            //修改秘钥token
            $tmp['token'] = str_random(50);
            
            if(DB::table('useradd')->where('id',$id)->update($tmp)){
                return redirect('/Mall')->with('success','激活成功');
            }else{
                return redirect('/')->with('error','激活失败');
            }
        }else{
            return redirect('/')->with('error','激活失败');
        }
    }

    /**
     * 前台登录页面
     */
    public function flogin()
    {
        return view('login.flogin');
    }

    /**
     * 前台登录操作
     */
   public function doflogin(Request $request)
   {

        $res = $request->only('email','password');
        $data = DB::table('useradd')->where('email',$res['email'])->first();
        if($data){
            if(Hash::check($res['password'],$data['password'])){
                session(['fid'=>$data['id']]);

                $request->session()->put('email',$res['email']);
                
                //如有有redirect就跳转到评论页面
                $url = $request->input('redirect');
                if($url){
                    return redirect($url)->with('success','登录成功');
                }else{
                    return redirect('/Mall')->with('success','登录成功');

                }
                
            }else{
                return back()->with('error','密码不正确');
            }
        }else{
            return back()->with('error','用户名不正确');
        }
   }

   /**
    * 前台退出登录操作
    */
   public function logout(Request $request)
   {
         $request->session()->forget('fid');
        
         return redirect('/flogin');
   }

    /**
     * 密码找回页面
     */
    public function forget()
    {
        return view('login.forget');
    }
    /**
     * 密码找回操作
     */
    public function doforget(Request $request)
    {

        $email = $request->input('email');
        $data = DB::table('useradd')->where('email','=',$email)->first();        
         
         if($data){
             //发送邮件
                Mail::send('email.zhaohui',['id'=>$data['id'],'token'=>$data['token']], function ($message) use ($email) {
                $message->to($email)->subject('找回密码');   
            });
                 return view('login.zhaohui');
         }else{
            return back()->with('error','邮箱不正确');
         }
        
    }


    /**
     * 修改密码验证
     */
    public function yanzheng(Request $request)
    {
        $data = DB::table('useradd')->where('id',$request->input('id'))->first();

       if($request->input('token')==$data['token']){
            return view('login.resetpass',['id'=>$data['id'],'token'=>$data['token']]);
       }else{
            return back()->with('error','非法用户');
       } 
    }

    /**
     * 重置密码
     */
    public function reset(reset $request)
    {


        $data = DB::table('useradd')->where('id',$request->input('id'))->first();

       if($request->input('token')==$data['token']){

            $temp['password'] = Hash::make($request->input('password'));
            $temp['token'] = str_random(50);

            $res = DB::table('useradd')->where('id',$data['id'])->update($temp);

            if($res){
                return redirect('/flogin')->with('success','修改成功');
            }else{
                return back()->with('error','非法用户');
            }
       }else{
            return back()->with('error','非法用户');
       } 

    }










}
