<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class testcontroller extends Controller
{
    
    public function test()
    {
         $data = fenleicontroller::getCateByPid(0);
          // dd($data);
       
        return view('test',['data'=>$data]);
    }
}
