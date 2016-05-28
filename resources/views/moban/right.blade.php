<div class="col-md-3">
	<aside class="sidebar">

		<form action="/list" method='get' >
			<div class="input-group input-group-lg">
				<input class="form-control" placeholder="Search..." name="keyword" id="s" type="text">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>

		<hr />

		<h4>文章分类</h4>
		<ul class="nav nav-list primary push-bottom">
			@foreach($firstclass as $k=>$v)
			<li><a href="/list?cate={{$v['id']}}">{{$v['name']}}</a></li>
			@endforeach
		</ul>

		<div class="tabs">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i>热门</a></li>
				<li><a href="#recentPosts" data-toggle="tab">最近</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="popularPosts">
					<ul class="simple-post-list">
					@foreach($host as $k=>$v)
						<li>
							<div class="post-image">
								<div class="img-thumbnail">
									<a href="/post/{{$v['id']}}">
										<img src="{{$v['pic']}}" width="40px" alt="">
									</a>
								</div>
							</div>
							<div class="post-info">
								<a href="/post/{{$v['id']}}">{{$v['title']}}</a>
								<div class="post-meta">
									 {{substr($v['created_at'],5,5)}}
								</div>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
				<div class="tab-pane" id="recentPosts">
					<ul class="simple-post-list">
					@foreach($newartic as $k=>$v)
						<li>
							<div class="post-image">
								<div class="img-thumbnail">
									<a href="/post/{{$v['id']}}">
										<img src="{{$v['pic']}}" width="40px" alt="">
									</a>
								</div>
							</div>
							<div class="post-info">
								<a href="/post/{{$v['id']}}">{{$v['title']}}</a>
								<div class="post-meta">
									 {{substr($v['created_at'],5,5)}}
								</div>
							</div>
						</li>
					@endforeach
					</ul>
				</div>
			</div>
		</div>
	</aside>
</div>