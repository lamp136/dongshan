@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>修改用户</span></div>
  <div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admins/user/update" method='post'>
	
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
  
    <!-- 用户名输入框 -->
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">用户名</label>
          <div class="mws-form-item">
            <input type="text" name='username' value="{{$userinfo['username']}}" class="small"></div>
        </div>
      </div>
      
      <!-- 邮箱 -->
    <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">邮箱</label>
          <div class="mws-form-item">
            <input type="text" name='email' value="{{$userinfo['email']}}" class="small"></div>
        </div>
    </div>
    
    @if($role_id)
    <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">角色</label>
          <div class="mws-form-item">
            <select class="small" name='role_id'>
              @foreach($role as $rk=>$rv)
                <option value="{{$rv['id']}}" @if($rv['display_name']==$display) selected  @endif>{{$rv['name']}}--{{$rv['display_name']}}</option>
              @endforeach
            </select>
            </div>
        </div>
    </div>
    @endif

      <div class="mws-button-row">
        <input type="hidden" name='old_role_id' value="{{$role_id}}">
        <input type='hidden' name='id' value="{{$userinfo['id']}}">
        <input type="submit" value="修改" class="btn btn-danger">
        <input type="reset" value="重置" class="btn ">
      </div>
	 {{csrf_field()}}
    </form>
  </div>
</div>
@endsection