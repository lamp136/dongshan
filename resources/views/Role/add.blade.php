@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>角色添加</span></div>
  <div class="mws-panel-body no-padding">
    <form class="mws-form" action="/Role/insert" method='post'>
	
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
  
    
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">角色名</label>
          <div class="mws-form-item">
            <input type="text" name='name' value="{{old('username')}}" class="small"></div>
        </div>
      </div>
      
      <div class="mws-form-inline">
        <div class="mws-form-row">
          <label class="mws-form-label">作用</label>
          <div class="mws-form-item">
            <input type="text" name='display_name'  class="small"></div>
        </div>
      </div>
      
     <div class="mws-form-inline">
        <div class="mws-form-row">
	        <label class="mws-form-label">描述</label>
	        <div class="mws-form-item">
	            <input type="text" name='description' class="small">
	        </div>
        </div>
    </div>
      
      <div class="mws-button-row">
        <input type="submit" value="提交" class="btn btn-danger">
        <input type="reset" value="重置" class="btn ">
      </div>
	 {{csrf_field()}}
    </form>
  </div>
</div>
@endsection