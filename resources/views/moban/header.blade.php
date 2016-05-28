<header id="header">
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
						<a class="dropdown-toggle" onclick="location.href=this.href" href="/list?cate={{$v['id']}}">
							{{$v['name']}}
							<i class="fa fa-angle-down"></i>
						</a>
						@if($v['sub'])
						<ul class="dropdown-menu">
						@foreach($v['sub'] as $a=>$b)
							<li class="dropdown-submenu">
								<a onclick="location.href=this.href" href="/list?cate={{$b['id']}}">{{$b['name']}}</a>
								@if($b['sub'])
								<ul class="dropdown-menu">
									@foreach($b['sub'] as $c=>$d)
									<li><a onclick="location.href=this.href" href="/list?cate={{$d['id']}}">{{$d['name']}}</a></li>
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
				</ul>
				
			</nav>
		</div>
	</div>
</header>