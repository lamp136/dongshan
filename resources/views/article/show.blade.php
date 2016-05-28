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
				<span><i class="fa fa-user"></i> By <a href="#">{{$res['username']}}</a> </span>
				<span><i class="fa fa-tag"></i> <a href="/list?cate={{$res['cate_id']}}">{{$res['name']}}</a>
				<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
			</div>
			<p>{!!$res['content']!!}</p>


			<div class="post-block post-author clearfix">
				<h3><i class="fa fa-user"></i>{{$res['username']}}</h3>
				<div class="img-thumbnail">
					<a href="blog-post.html">
						<img src="/qiantai/img/avatar.jpg" alt="">
					</a>
				</div>
				<p><strong class="name"><a href="#">John Doe</a></strong></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
			</div>

			<div class="post-block post-comments clearfix">
				<h3><i class="fa fa-comments"></i>留言</h3>
				@foreach($comment as $k=>$v)
				<ul class="comments">
					<li>
						<div class="comment">
							<div class="img-thumbnail">
								<img class="avatar" alt="" src="/qiantai/img/avatar-2.jpg">
							</div>
							
							<div class="comment-block">
								<div class="comment-arrow"></div>
								<span class="comment-by">
									<strong>{{$v['username']}}</strong>
									
								</span>
								<p>{!!$v['contents']!!}</p>
							</div>
							
						</div>

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
				<form action="{{url('/comment/insert')}}" method="post">
				
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
