@extends('moban.qiantai')
@section('title')
	文章列表页
@endsection

@section('home')
	首页
@endsection
@section('blog')
	文章列表
@endsection


@section('header')
	{!!App\Http\Controllers\layoutcontroller::header()!!}
@endsection

@section('content')
<div class="col-md-9">
	<div class="blog-posts">
		
		@foreach($data as $k=>$v)
		<article class="post post-medium">
			<div class="row">

				<div class="col-md-5">
					<div class="post-image">
						<div class="owl-carousel" data-plugin-options='{"items":1}'>
							<div>
								<div class="img-thumbnail">
									<img class="img-responsive" src="{{$v['pic']}}" alt="">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-7">

					<div class="post-content">

						<h2><a href="/post/{{$v['id']}}">{{$v['title']}}</a></h2>
						<p>{{$v['descr']}}[...]</p>

					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="post-meta">
						<span><i class="fa fa-calendar"></i>{{substr($v['created_at'],0,10)}}</span>
						<span><i class="fa fa-user"></i> By <a href="#">{{$v['email']}}</a> </span>
						<span><i class="fa fa-tag"></i> <a href="#">{{$v['name']}}</a></span>
						<span><i class="fa fa-comments"></i> <a href="#">{{commentsnum($v['id'])}}评论</a></span>
						<a href="/post/{{$v['id']}}" class="btn btn-xs btn-primary pull-right">更多</a>
					</div>
				</div>
			</div>

		</article>
		@endforeach
		<ul class="pagination pagination-lg pull-right">
		
			{!!$data->appends($request)->render()!!}
		</ul>

	</div>
</div>
@endsection

@section('right')
	{!!App\Http\Controllers\layoutcontroller::right()!!}
@endsection