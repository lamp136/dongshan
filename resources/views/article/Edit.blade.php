@extends('moban.moban')
@section('content')
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/admin/udeitor/lang/zh-cn/zh-cn.js"></script>


<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>文章修改</span>
</div>
<div class="mws-panel-body no-padding">
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
          <div class="mws-form-message error">
                {{session('error')}}    
           </div>
          @endif
	<form class="mws-form" action="/admins/article/update" method='post' enctype="multipart/form-data">
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">文章标题</label>
				<div class="mws-form-item">
					<input type="text" name='title' class="small" value="{{$content['title']}}">
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">文章分类</label>
				<div class="mws-form-item">
					<select class="small" name='cate_id'>
						<option value='0'>请选择</option>
						@foreach($fenlei as $k=>$v)
							<option value='{{$v["id"]}}' @if($v['id']==$content['cate_id']) selected @endif>{{$v['name']}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">文章描述</label>
				<div class="mws-form-item">
					<textarea rows="" cols="" class="small" name='descr'>{{$content['descr']}}</textarea>
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">文章内容</label>
				<div class="mws-form-item">
					<script id="editor" type="text/plain" style="width:800px;height:500px;" name='content'>{!! $content['content'] !!}</script>
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">文章图片</label>
				<div class="mws-form-item">
					<img src="{{$content['pic']}}" width='40' alt="">
					<input type="file"  name='pic'>
				</div>
			</div>

		</div>
		<div class="mws-button-row">
			<input type='hidden' name='id' value="{{$content['id']}}">
			<input type="submit" value="添加" class="btn btn-danger">
			<input type="reset" value="重置" class="btn">
		</div>
		{{csrf_field()}}
	</form>
	<script type="text/javascript">
		var ue = UE.getEditor('editor');
	</script>
</div>    	
</div>

@endsection