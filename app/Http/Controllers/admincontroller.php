<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class admincontroller extends Controller
{
    //网站后台首页
    public function index(){
    		
        return view('admin.index');
    }


}
