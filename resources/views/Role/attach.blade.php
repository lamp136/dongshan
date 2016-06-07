@extends('moban.moban')
@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>绑定角色</span>
</div>
<div class="mws-panel-body no-padding">
	<form action="/Role/attachrole" method='post' class="mws-form">
		<div class="mws-form-inline">
			
			<div class="mws-form-row">
				<label class="mws-form-label">角色</label>
				<div class="mws-form-item">
					<select class="small" name='role_id'>
						@foreach($role as $rk=>$rv)
							<option value="{{$rv['id']}}" >{{$rv['name']}}--{{$rv['display_name']}}</option>
						@endforeach
					</select>
				</div>
			</div>		
			<div class="mws-form-row">
				<label class="mws-form-label">要绑定的用户</label>
				<div class="mws-form-item">
					<select class="small" name='user_id'>
						@foreach($users as $k=>$v)
							<option value="{{$v['id']}}" @if($v['id']==$id) selected @endif>{{$v['username']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
		</div>
		{{csrf_field()}}
		<div class="mws-button-row">
			<input type="submit" class="btn btn-danger" value="绑定">
			<input type="reset" class="btn " value="重置">
		</div>
	</form>
</div>    	
</div>
@endsection