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
					<h2>用户登录</h2>
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

							 @if (session('success'))
			                      <div class="alert alert-danger">
			                          <ul>
			                              <li>{{session('success')}}</li>
			                          </ul>
			                      </div>
			                 @endif

								<h4>用户登录</h4>
								<form action="" id="" method="post">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>邮箱</label>
												<input type="text" value="" class="form-control input-lg">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<a class="pull-right" href="/forget/">找回密码</a>
												<label>密码</label>
												<input type="password" value="" class="form-control input-lg">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<span class="remember-box checkbox">
												<label for="rememberme">
													<input type="checkbox" id="rememberme" name="rememberme">Remember Me
												</label>
											</span>
										</div>
										<div class="col-md-6">
											<input type="submit" value="Login" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
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

</div>

@endsection



