@extends('moban.moban');

@section('content')
	@if(session('times'))
	  <h3>欢迎{{session('name')}}管理员登录</h3>
	  <h3>您上次登录的时间是{{session('times')}}</h3>
	  {{session(['times'=>date('Y-m-d H:i:s')])}}
	@else
	  {{session(['times'=>date('Y-m-d H:i:s')])}}
	  <h3>欢迎{{session('name')}}管理员登录</h3>
	  <h3>您是第一次登录</h3>
  	@endif
@endsection


