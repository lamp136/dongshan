@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>修改图片</span></div>
  <div class="mws-panel-body no-padding">
    <form class="mws-form" action="/lunbo/update" method='post' enctype="multipart/form-data">
	
        @if (count($errors) > 0)
        <div class="mws-form-message error">
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		</div>
		@endif

    @if(session('error'))
        {{session('error')}}
    @endif
  
    <!-- 用户名输入框 -->
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">名称</label>
          <div class="mws-form-item">
            <input type="text" name='picname' value="{{$data['picname']}}" class="small"></div>
        </div>
      </div>
      <!-- 密码输入框 -->
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">简介</label>
          <div class="mws-form-item">
            <input type="text" name='content' value="{{$data['content']}}"  class="small"></div>
        </div>
      </div>
      <!-- 确认密码 -->
     <div class="mws-form-inline">
        <div class="mws-form-row">
	        <label class="mws-form-label">图片</label>
	        <div class="mws-form-item">
            <img src="{{$data['pic']}}" width="40px">
	            <input type="file" name='pic' class="small">
	        </div>
        </div>
    </div>
      
      <div class="mws-button-row">
        <input type="hidden" name='id' value="{{$data['id']}}">
        <input type="submit" value="修改" class="btn btn-danger">
        <input type="reset" value="重置" class="btn ">
      </div>
	 {{csrf_field()}}
    </form>
  </div>
</div>
@endsection