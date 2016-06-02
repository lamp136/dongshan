<header id="header">
	@if(session('fid'))
		<div style="float:right;margin-right:50px"><a href=#>欢迎{{session('email')}}用户回来</a></div>
		<div style="float:right;margin-right:30px"><a href="/logout">退出登录</a></div>
	@else
		<div style="float:right;margin-right:50px"><a href="/flogin">登录</a></div>
		<div style="float:right;margin-right:30px"><a href="/register">注册</a></div>
	@endif

	<div class="container">
		<h1 class="logo">
			<a href="index.html">
				<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/qiantai/img/logo.png">
			</a>
		</h1>
		
		<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
			<i class="fa fa-bars"></i>
		</button>
	</div>
	<div class="navbar-collapse nav-main-collapse collapse">
		<div class="container">
		
			<nav class="nav-main mega-menu">
				
				<ul class="nav nav-pills nav-main" id="mainMenu">
				@foreach($fenlei as $k=>$v)
					<li class="dropdown">
						<a class="dropdown-toggle" onclick="location.href=this.href" href="/shop/list?cate={{$v['id']}}">
							{{$v['name']}}
							<i class="fa fa-angle-down"></i>
						</a>
						@if($v['sub'])
						<ul class="dropdown-menu">
						@foreach($v['sub'] as $a=>$b)
							<li class="dropdown-submenu">
								<a onclick="location.href=this.href" href="/shop/list?cate={{$b['id']}}">{{$b['name']}}</a>
								@if($b['sub'])
								<ul class="dropdown-menu">
									@foreach($b['sub'] as $c=>$d)
									<li><a onclick="location.href=this.href" href="/shop/list?cate={{$d['id']}}">{{$d['name']}}</a></li>
									@endforeach
								</ul>
								@endif
							</li>
						@endforeach
							<!-- <li><a href="index.html">{{$b['name']}}</a></li> -->
							
						</ul>
						@endif
					</li>
					@endforeach
					<div style="float:left;margin-top:8px" ><a href="/cart/index">购物车</a></div>
				</ul>
			</nav>
		</div>
	</div>
</header>