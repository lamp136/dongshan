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
	购物车
@endsection
@section('content')
<div class="row featured-boxes">
	<div class="col-md-12">
		<div class="featured-box featured-box-secundary featured-box-cart">
			<div class="box-content">
				<form method="post" action="/order/insert">
					<table cellspacing="0" class="shop_table cart">
						<thead>
							<tr>
								<th class="product-remove">
									&nbsp;
								</th>
								<th class="product-thumbnail">
									&nbsp;
								</th>
								<th class="product-name">
									商品名称
								</th>
								<th class="product-price">
									商品价格
								</th>
								<th class="product-quantity">
									商品数量
								</th>
								<th class="product-subtotal">
									总计
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $k=>$v)
							<tr class="cart_table_item" id="parent">
								<td class="product-remove">
									<a title="Remove this item" class="remove" id="{{$v['id']}}" href="#">
										<i class="fa fa-times"></i>
									</a>
								</td>
								<td class="product-thumbnail">
									<a href="shop-product-sidebar.html">
										<img width="100" height="100" alt="" class="img-responsive" src="{{explode(',',$v['pic'])[0]}}">
									</a>
								</td>
								<td class="product-name">
									<a href="shop-product-sidebar.html">{{$v['title']}}</a>
								</td>
								<td class="product-price">
									<span class="amount">{{$v['price']}}元</span>
								</td>
								<td class="product-quantity">
										<div class="quantity">
											<input type="hidden" name='goods[{{$k}}][id]' value="{{$v['id']}}">
											<input type="button" class="minus" value="-">
											<input type="text" class="input-text qty text" title="Qty" value="{{$v['num']}}" name="goods[{{$k}}][num]" min="1" step="1">
											<input type="button" class="plus" value="+">
										</div>
								</td>
								<td class="product-subtotal">
									<span class="amount">{{$v['total']}}</span>
								</td>
							</tr>
							@endforeach
							<tr>
								<td class="actions" colspan="6">
									<div class="actions-continue">
										<input type="submit" value="结算中心"  class="btn btn-default">
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					{{csrf_field()}}
				</form>
			</div>
		</div>
	</div>
</div>
@section('myjs')
	<script type="text/javascript">
		$('.remove').click(function(){

			var id = $(this).attr('id');
			var a = $(this);
			$.ajax({
				url:'/cart/delete',
				type:'get',
				data: {id:id},
				dataType:'json',
				success:function(res){
					if(res==1){
						a.parents('#parent').remove();
					}
				}
			})
		})
	</script>
@endsection
@endsection