@extends('moban.qiantai')
@section('title')
	商品详情
@endsection
@section('home')
	首页
@endsection
@section('blog')
	商品详情
@endsection

@section('header')
	{!!App\Http\Controllers\layoutcontroller::goodsheader()!!}
@endsection

@section('content')
<div class="col-md-9">

	<div class="row">
		<div class="col-md-6">

			<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
				<div>
					<div class="thumbnail">
						<img alt="" class="img-responsive img-rounded" src="{{$goods['pic']}}">
					</div>
				</div>
			</div>

		</div>

		<div class="col-md-6">

			<div class="summary entry-summary">

				<h2 class="shorter"><strong>{{$goods['title']}}</strong></h2>

				

				<div title="Rated 5.00 out of 5" class="star-rating">
					<span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
				</div>

				<p class="price">
					<span class="amount">{{$goods['price']}}元</span>
				</p>

				<!-- <p class="taller"></p> -->
				<form enctype="multipart/form-data"  action="/cart/insert" method="post" class="cart">
					<div class="quantity">
						<input type="button" name="jian" class="minus" value="-">
						<input type="text" class="input-text qty text" title="Qty" value="1" name="num" min="1" step="1">
						<input type="button" name='jia' class="plus" value="+">
					</div>
					<input type="hidden" name='id' value="{{$goods['id']}}">
					{{csrf_field()}}
					<button  class="btn btn-primary btn-icon">加入购物车</button>
				</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="tabs tabs-product">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#productDescription" data-toggle="tab">商品简介</a></li>
					<li><a href="#productInfo" data-toggle="tab">商品规格</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="productDescription">
						<p>{!!$goods['content']!!}</p>
					</div>
					<div class="tab-pane" id="productInfo">
						<table class="table table-striped push-top">
							<tbody>
								<tr>
									<th>
										颜色:
									</th>
									<td>
										@foreach($color as $k=>$v)
										<input type='checkbox' name='color[]' value="{{$v}}">{{$v}}
										@endforeach
									</td>
								</tr>
								<tr>
									<th>
										大小
									</th>
									<td>
										@foreach($size as $k=>$v)
										<input type='checkbox' name='size[]' value="{{$v}}">{{$v}}
										@endforeach
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="productReviews">
						<ul class="comments">
							<li>
								<div class="comment">
									<div class="img-thumbnail">
										<img class="avatar" alt="" src="img/avatar-2.jpg">
									</div>
									<div class="comment-block">
										<div class="comment-arrow"></div>
										<span class="comment-by">
											<strong>John Doe</strong>
											<span class="pull-right">
												<div title="Rated 5.00 out of 5" class="star-rating">
													<span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
												</div>
											</span>
										</span>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
									</div>
								</div>
							</li>
						</ul>
						<hr class="tall">
						<h4>Add a review</h4>
						<div class="row">
							<div class="col-md-12">

								<form action="" id="submitReview" method="post">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6">
												<label>Your name *</label>
												<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
											</div>
											<div class="col-md-6">
												<label>Your email address *</label>
												<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Review *</label>
												<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Submit Review" class="btn btn-primary" data-loading-text="Loading...">
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr class="tall" />

	<div class="row">

		<div class="col-md-12">
			<h2>相关商品</h2>
		</div>

		<ul class="products product-thumb-info-list">
		@foreach($guanLgoods as $k=>$v)
			<li class="col-sm-3 col-xs-12 product">
				<span class="product-thumb-info">
					<a href="shop-cart.html" class="add-to-cart-product">
						<span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
					</a>
					<a href="shop-product-sidebar.html">
						<span class="product-thumb-info-image">
							<span class="product-thumb-info-act">
								<span class="product-thumb-info-act-left"><em>View</em></span>
								<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
							</span>
							<img alt="" class="img-responsive" src="{{$v['pic']}}">
						</span>
					</a>
					<span class="product-thumb-info-content">
						<a href="shop-product-sidebar.html">
							<h4>{{$v['title']}}</h4>
							<span class="price">
								
								<ins><span class="amount">{{$v['price']}}元</span></ins>
							</span>
						</a>
					</span>
				</span>
			</li>
		@endforeach
		</ul>

	</div>

</div>
@endsection

@section('right')
	{!!App\Http\Controllers\layoutcontroller::goodsright()!!}
@endsection

@section('myjs')
	<script type="text/javascript">
		$('input[name=jian]').click(function(){
			var num = $('input[name=num]').val();

			if(num<=0){
				$('input[name=num]').val(0);
			}else{
				var num = --num;
				$('input[name=num]').val(num);
			}
		})

		$('input[name=jia]').click(function(){
			var num = $('input[name=num]').val();

			if(num>=100){
				$('input[name=num]').val(100);
			}else{
				var num = ++num;
				$('input[name=num]').val(num);
			}
		})
	</script>
@endsection