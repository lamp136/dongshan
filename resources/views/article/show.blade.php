@extends('moban.qiantai')
@section('title')
	{{$res['title']}}
@endsection
@section('home')
	首页
@endsection
@section('blog')
	文章详情
@endsection

@section('header')
	{!!App\Http\Controllers\layoutcontroller::header()!!}
@endsection

@section('content')
<div class="col-md-9">
<div class="blog-posts single-post">

	<article class="post post-large blog-single-post">
		<div class="post-image">
			<div class="owl-carousel" data-plugin-options='{"items":1}'>
				<div>
					<div class="img-thumbnail">
						<img class="img-responsive" src="{{$res['pic']}}" alt="">
					</div>
				</div>
				
			</div>
		</div>

		<div class="post-date">
			<span class="day">{{substr($res['created_at'],8,2)}}</span>
			<span class="month">{{substr($res['created_at'],5,2)}}</span>
		</div>

		<div class="post-content">

			<h2><a href="blog-post.html">{{$res['title']}}</a></h2>

			<div class="post-meta">
				<span><i class="fa fa-user"></i> By <a href="#">{{$res['email']}}</a> </span>
				<span><i class="fa fa-tag"></i> <a href="/list?cate={{$res['cate_id']}}">{{$res['name']}}</a>
				<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
			</div>
			<p>{!!$res['content']!!}</p>


			

			<div class="post-block post-comments clearfix">
				<h3><i class="fa fa-comments"></i>留言</h3>
				@foreach($comment as $k=>$v)
				<ul class="comments">
					<li>
						@if($v['pid']==0)
						<div class="comment">
							<div class="img-thumbnail">
								<img class="avatar" alt="" src="">
							</div>
							<div class="comment-block">
								<div class="comment-arrow"></div>
								<span class="comment-by">
									<strong>{{$v['email']}}</strong>
									<span class="pull-right">
										<span> <a class='huifu' pid="{{$v['id']}}" pidname="{{$v['email']}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-reply"></i>回复</a></span>
									</span>
								</span>
								<p>{!!$v['contents']!!}</p>
								<span class="date pull-right">{{$v['time']}}</span>
							</div>
						</div>
						@endif
						@if($v['pid']!=0)
						<ul class="comments reply">
							<li>
								<div class="comment">
									<div class="img-thumbnail">
										<img class="avatar" alt="" src="">
									</div>
									<div class="comment-block">
										<div class="comment-arrow"></div>
										<span class="comment-by">
											<strong>{{$v['email']}}</strong>
											<span class="pull-right">
												<span> <a class='huifu' pid="{{$v['id']}}" pidname="{{$v['email']}}" data-toggle="modal" data-target="#myModal"><i class="fa fa-reply"></i>回复</a></span>
											</span>
										</span>
										<p>{{$v['contents']}}</p>
										<span class="date pull-right">{{$v['time']}}</span>
									</div>
								</div>
							</li>
						</ul>
						@endif
					</li>
					
				</ul>
				@endforeach
			</div>
			

			<div class="post-block post-leave-comment">
				<h3>留言板</h3>
				<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
				<script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
				<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
				<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
				<script type="text/javascript" charset="utf-8" src="/admin/udeitor/lang/zh-cn/zh-cn.js"></script>
				<form action="/comment/insert" method="post">
				   
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<script id="editor" type="text/plain" style="width:800px;height:200px;" name='contents'></script>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">

							<input type='hidden' name="article_id" value="{{$res['id']}}">
							<input type='hidden' name="pid" value="0">
							<input type="submit" value="发布" class="btn btn-primary btn-lg" data-loading-text="Loading...">
						</div>
					</div>
					{{csrf_field()}}
				</form>
			</div>
			<script type="text/javascript">
				var ue = UE.getEditor('editor',{
					toolbars:[
						['fullscreen', 'source', 'undo', 'redo', 'bold','forecolor','italic']
					]
				});
					
			</script>
		</div>
	</article>
</div>
</div>
@endsection

@section('right')
	{!!App\Http\Controllers\layoutcontroller::right()!!}
@endsection

<!-- 模态框回复留言 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	      		<input type="hidden" name="address_id" value="">
	      		{{csrf_field()}}
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        	<h4 class="modal-title" id="myModalLabel">回复留言</h4>
	      	</div>
<!-- </form> -->
	      	<div class="modal-body">
	      	<!-- form表单 -->
	        <form action="/comment/message" method="post">

	        	<div class="form-group">
			    	<label for="exampleInputPassword1">输入信息</label>
			    	 <textarea class="form-control" id="exampleInputPassword1" name="contents" id="" cols="30" rows="10"></textarea>
				</div>

		      	<div class="modal-footer">
		        	{{csrf_field()}}
		        	<input type="hidden" name='pid' value=""> <!-- 留言人的id -->
		        	<input type="hidden" name="article_id" value="{{$res['id']}}"> <!-- 文章id -->
		        	<input type="hidden" name="pidname" value=""><!-- 父id的名字 -->
		        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		        	<button type="submit" class="btn btn-primary">保存</button>
		      	</div>
    		</form>
    		</div>
    	</div>
  		</div>
  	</div>

 <!-- 获取评论人的id赋值给模态框里的隐藏域 -->
 @section('myjs')
<script type="text/javascript">
	$('.huifu').click(function(){
		var pid = $(this).attr('pid');
		var pidname = $(this).attr('pidname');

		$('input[name=pidname]').attr('value',pidname);
		$('input[name=pid]').attr('value',pid);
	})
</script>	

@endsection