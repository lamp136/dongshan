<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class commoncontroller extends Controller
{

        /**
         *  验证码
         */
        public function createvcode(){

        ob_clean();
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 150, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        // \Session::flash('milkcaptcha', $phrase);
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
        
    }
        
}
