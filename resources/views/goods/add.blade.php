@extends('moban.moban')
@section('content')
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/admin/udeitor/lang/zh-cn/zh-cn.js"></script>


<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>商品添加</span>
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
	<form class="mws-form" action="/admins/goods/insert" method='post' enctype="multipart/form-data">
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">商品名称</label>
				<div class="mws-form-item">
					<input type="text" name='title' class="small">
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品价格</label>
				<div class="mws-form-item">
					<input type="text" name='price' class="small">
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品库存</label>
				<div class="mws-form-item">
					<input type="text" name='kucun' class="small">
				</div>
			</div>
			<div class="mws-form-row">
				<label class="mws-form-label">商品分类</label>
				<div class="mws-form-item">
					<select class="small" name='cate_id'>
						<option value='0'>请选择</option>
						@foreach($cate as $k=>$v)
							<option value='{{$v["id"]}}'>{{$v['name']}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">商品颜色</label>
				<div class="mws-form-item clearfix">
					<ul class="mws-form-list inline">
						<li><input type="checkbox" name='color[]' value='红色'> <label>红色</label></li>
						<li><input type="checkbox" name='color[]' value="土豪金"> <label>土豪金</label></li>
						<li><input type="checkbox" name='color[]' value="黑色"> <label>黑色</label></li>
						<li><input type="checkbox" name='color[]' value="绿色"> <label>绿色</label></li>
						<li><input type="checkbox" name='color[]' value="灰色"> <label>灰色</label></li>
					</ul>
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">商品尺寸</label>
				<div class="mws-form-item clearfix">
					<ul class="mws-form-list inline">
						<li><input type="checkbox" name='size[]' value='32'> <label>32</label></li>
						<li><input type="checkbox" name='size[]' value="37"> <label>37</label></li>
						<li><input type="checkbox" name='size[]' value="40"> <label>40</label></li>
						<li><input type="checkbox" name='size[]' value="55"> <label>55</label></li>
						<li><input type="checkbox" name='size[]' value="12"> <label>12</label></li>
					</ul>
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">商品描述</label>
				<div class="mws-form-item">
					<script id="editor" type="text/plain" style="width:800px;height:500px;" name='content'></script>
				</div>
			</div>

			<div class="mws-form-row">
				<label class="mws-form-label">商品图片</label>
				<div class="mws-form-item">
					<input type="file"  name='pic'>
				</div>
			</div>

		</div>
		<div class="mws-button-row">
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
