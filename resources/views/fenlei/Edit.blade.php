@extends('moban.moban')

@section('content')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>修改分类</span>
</div>
<div class="mws-panel-body no-padding">
	<form action="/admins/fenlei/update" method='post' class="mws-form">
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">分类名称</label>
				<div class="mws-form-item">
					<input type="text" name='name' class="small" value="{{$name}}">
				</div>
			</div>
			
			<div class="mws-form-row">
				<label class="mws-form-label">父级分类</label>
				<div class="mws-form-item">
					<select class="small" name='pid'>
						<option value="0">请选择</option>
						@foreach($cate as $k=>$v)
							<option value="{{$v['id']}}" @if($v['id']==$paths) selected @endif>{{$v['name']}}</option>
						@endforeach
					</select>
				</div>
			</div>	
		</div>
		{{csrf_field()}}
		<div class="mws-button-row">
			<input type='hidden' name='id' value='{{$id}}'>
			<input type="submit" class="btn btn-danger" value="修改">
			<input type="reset" class="btn " value="重置">
		</div>
	</form>
</div>    	
</div>
@endsection