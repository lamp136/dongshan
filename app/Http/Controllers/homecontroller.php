<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\lunbo;
class homecontroller extends Controller
{
    public function Mall()
    {
    	$data = lunbo::all();
    	$hotgoods = Goods::limit(6)->get();
    	$newgoods = Goods::orderBy('id','desc')->limit(6)->get();

        return view('home.Mall',['imgs'=>$data,'hotgoods'=>$hotgoods,'newgoods'=>$newgoods]);
    }
}
