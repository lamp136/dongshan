@extends('moban.qiantai')
@section('title')
	商品列表
@endsection
@section('home')
	首页
@endsection
@section('blog')
	商品列表
@endsection

@section('header')
	{!!App\Http\Controllers\layoutcontroller::goodsheader()!!}
@endsection

@section('content')
<div class="col-md-9">

	<div class="row">
		<div class="col-md-6">
			<h2 class="shorter"><strong>商品列表</strong></h2>
			<p>{{$data[0]['name']}}</p>
		</div>
	</div>

	<div class="row">

		<ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
		@foreach($data as $k=>$v)
			<li class="col-md-4 col-sm-6 col-xs-12 product">
				
				<span class="product-thumb-info">
					<a href="/goods/{{$v['id']}}" class="add-to-cart-product">
						<span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
					</a>
					<a href="/goods/{{$v['id']}}">
						<span class="product-thumb-info-image">
							<span class="product-thumb-info-act">
								<span class="product-thumb-info-act-left"><em>View</em></span>
								<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
							</span>
							<img alt="" class="img-responsive" src="{{$v['pic']}}">
						</span>
					</a>
					<span class="product-thumb-info-content">
						<a href="/goods/{{$v['id']}}">
							<h4>{{$v['title']}}</h4>
							<span class="price">
								
								<ins><span class="amount">{{$v['price']}}</span></ins>
							</span>
						</a>
					</span>
				</span>
			</li>
		@endforeach
		</ul>

	</div>

	<div class="row">
		<div class="col-md-12">
			{!!$data->appends($request)->render()!!}
		</div>
	</div>
</div>
@endsection

@section('right')
	{!!App\Http\Controllers\layoutcontroller::goodsright()!!}
@endsection