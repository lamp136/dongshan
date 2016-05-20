@extends('login.register')
		
@section('main')

<div role="main" class="main">

	<section class="page-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Pages</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>修改密码</h2>
				</div>
			</div>
		</div>
	</section>

	<div class="container">

		<div class="row">
			<div class="col-sm-offset-3 col-md-12">

				<div class="row featured-boxes login">
					<div class="col-sm-6">
						<div class="featured-box featured-box-secundary default info-content">
							<div class="box-content">

							@if (count($errors) > 0)
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
								<h4>修改密码</h4>
								<form action="/reset" id="" method="post">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>新密码</label>
												<input type="password" value="" name='password'  class="form-control input-lg">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												
												<label>确认密码</label>
												<input type="password" value="" name='repassword' class="form-control input-lg">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<span class="remember-box checkbox">
												<label for="rememberme">
												</label>
											</span>
										</div>
										<div class="col-md-6">
											<input type='hidden' name='id' value='{{$id}}'>
											<input type='hidden' name='token' value='{{$token}}'>
											<input type="submit" value="提交" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
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

	</div>

</div>

@endsection



