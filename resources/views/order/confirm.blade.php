@extends('moban.qiantai')
@section('header')
	{!!App\Http\Controllers\layoutcontroller::goodsheader()!!}
@endsection

@section('title')
	购物车
@endsection
@section('home')
	首页
@endsection
@section('blog')
	确认信息
@endsection

@section('content')
<div class="col-md-12">
	<h3 class="shorter" style="margin-bottom:10px"><strong>确认信息</strong></h3>
</div>

<div class="row">
<div class="col-md-9">

	<div class="panel-group" id="accordion">
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">
						购买的商品
					</a>
				</h4>
			</div>
			<div id="collapseThree" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
				<div class="panel-body">
					<table cellspacing="0" class="shop_table cart">
						<thead>
							<tr>
								<th class="product-thumbnail">
									&nbsp;
								</th>
								<th class="product-name">
									商品名称
								</th>
								<th class="product-price">
									价格
								</th>
								<th class="product-quantity">
									数量
								</th>
								<th class="product-subtotal">
									小计
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($goods as $k=>$v)
							<tr class="cart_table_item">
								<td class="product-thumbnail">
									<a href="shop-product-sidebar.html">
										<img width="100" height="100" alt="" class="img-responsive" src="{{$v['pic']}}">
									</a>
								</td>
								<td class="product-name">
									<a href="shop-product-sidebar.html">{{$v['title']}}</a>
								</td>
								<td class="product-price">
									<span class="amount">{{$v['price']}}</span>
								</td>
								<td class="product-quantity">
									{{$v['num']}}
								</td>
								<td class="product-subtotal">
									<span class="amount">{{$v['total']}}</span>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<hr class="tall">

					<h4>收货地址</h4>
					<table cellspacing="0" class="cart-totals">
						<tbody>
							<tr class="cart-subtotal">
								<th>
									<strong>{{$address}}</strong>
								</th>
								
							</tr>
						</tbody>
					</table>

					<hr class="tall">

					<h4>支付方式</h4>
					<table cellspacing="0" class="cart-totals">
						<tbody>
							<tr class="cart-subtotal">
								<th>
									<strong>{{$zhifu}}</strong>
								</th>
								
							</tr>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>

	<div class="actions-continue">
		<a href="{{config(app.pay_interface)}}?to={{config(app.account)}}&money={{$totals}}&order_id={{$order_num}}&info=lamp136官网&return_url=http://a.com/return_url" class="btn btn-lg btn-primary push-top">确认购买</a>
	</div>

</div>

</div>
@endsection