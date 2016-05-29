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
	详细信息
@endsection

@section('content')
<div class="col-md-12">
	<h3 class="shorter" style="margin-bottom:10px"><strong>详细信息</strong></h3>
</div>

<div class="row">
<div class="col-md-9">

	<div class="panel-group" id="accordion">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">
						选择收货地址
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="accordion-body collapse in" aria-expanded="true">
				<div class="panel-body">
					<form action="/order/create" id="" method="post">
						@foreach($data as $k=>$v)
						<div style="background:;font-size:18px;margin-top:10px">
							<input  type="radio" name='address' value="{{$v['id']}}">姓名:{{$v['name']}}&nbsp地址:{{$v['sheng']}}--{{$v['shi']}}--{{$v['xian']}}--{{$v['jiedao']}}
						</div>
						@endforeach
						<div style="margin-top:50px;">
							<h3>选择支付方式</h3>
							<input type="radio" name="zhifu" value="支付宝">支付宝
							<input type="radio" name="zhifu" value="财付通">财付通
							<input type="radio" name="zhifu" value="xiaohai">小嗨支付
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="提交订单" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
							</div>
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
						添加新收货地址
					</a>
				</h4>
			</div>
			<div id="collapseTwo" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
				<div class="panel-body">
					<form action="/address/insert" id="" method="post">
						收件人:<input type="text" name="name" class="form-control" id="inputDefault">
						电话:<input type="text" name="phone" class="form-control" id="inputDefault">
						街道地址:<input type="text" name='jiedao' class="form-control" id="inputDefault">

						<div style="margin-top:15px">
							<select class="form-control input-sm mb-md" name="sheng" style="width:150px;float:left">
								<option>北京市</option>
								
							</select>
							<select class="form-control input-sm mb-md" name="shi" style="width:150px;float:left">
								<option>北京市</option>
								
							</select>
							<select class="form-control input-sm mb-md" name="xian" style="width:150px;float:left">
								<option>朝阳区</option>
								<option>东城区</option>
							</select>
						</div>

						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="添加地址" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
							</div>
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
		
	</div>
</div>

</div>
@endsection