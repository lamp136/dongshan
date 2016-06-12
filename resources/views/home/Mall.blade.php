<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
<meta charset="utf-8">
<title>商城首页</title>		
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Porto - Responsive HTML5 Template">
<meta name="author" content="okler.net">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Web Fonts  -->

<!-- Vendor CSS -->
<link rel="stylesheet" href="/qiantai/vendor/bootstrap/bootstrap.css">
<link rel="stylesheet" href="/qiantai/vendor/fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="/qiantai/vendor/owlcarousel/owl.carousel.css" media="screen">
<link rel="stylesheet" href="/qiantai/vendor/owlcarousel/owl.theme.css" media="screen">
<link rel="stylesheet" href="/qiantai/vendor/magnific-popup/magnific-popup.css" media="screen">

<!-- Theme CSS -->
<link rel="stylesheet" href="/qiantai/css/theme.css">
<link rel="stylesheet" href="/qiantai/css/theme-elements.css">
<link rel="stylesheet" href="/qiantai/css/theme-blog.css">
<link rel="stylesheet" href="/qiantai/css/theme-shop.css">
<link rel="stylesheet" href="/qiantai/css/theme-animate.css">

<!-- Current Page CSS -->
<link rel="stylesheet" href="/qiantai/vendor/rs-plugin/css/settings.css" media="screen">
<link rel="stylesheet" href="/qiantai/vendor/circle-flip-slideshow/css/component.css" media="screen">

<!-- Skin CSS -->
<link rel="stylesheet" href="/qiantai/css/skins/default.css">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="/qiantai/css/custom.css">

<!-- Head Libs -->
<script src="/qiantai/vendor/modernizr/modernizr.js"></script>

</head>
<body>

<div class="body">
	{!!App\Http\Controllers\layoutcontroller::goodsheader()!!}
<div role="main" class="main">
 <!-- 轮播图 -->
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	 
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>
	  
	  <div class="carousel-inner" role="listbox">
	  @foreach($imgs as $k=>$v)
	  @if($k==0)
	    <div class="item active">
	      <img src="{{$v['pic']}}" style="width:1500px;height:500px">
	    </div>
	  @else
	    <div class="item">
	      <img src="{{$v['pic']}}" style="width:1500px;height:500px">
	    </div>
	   @endif
	    @endforeach
	  </div>
	
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	    <span class="sr-only"><<</span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	    <span class="sr-only">>></span>
	  </a>
</div>  
	<!-- 轮播图end -->




<div class="container">
	<div class="row">
		<hr class="tall" />
	</div>

</div>

<div class="container">

	<div class="row">
	<div><h2>热门商品</h2></div>
	<ul class="products product-thumb-info-list" data-plugin-masonry="" style="position: relative; height: 1184px;">
		@foreach($hotgoods as $k=>$v)
		<li class="col-md-3 col-sm-6 col-xs-12 product" style="position: absolute; left: 0px; top: 25px;list-style:none;margin:10px 10px">
			
			<span class="product-thumb-info">
				
				<a href="/goods/{{$v['id']}}">
					<span class="product-thumb-info-image">
						<span class="product-thumb-info-act">
							<span class="product-thumb-info-act-left"><em>查看</em></span>
							<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i>详情</em></span>
						</span>

						<img alt="" class="img-responsive" src="{{explode(',',$v['pic'])[0]}}" width='100%'>
					</span>
				</a>
				<span class="product-thumb-info-content">
					<a href="/goods/{{$v['id']}}">
						<h4>{{$v['title']}}</h4>
						<span class="price">
							<del><span class="amount">$325</span></del>
							<ins><span class="amount">{{$v['price']}}</span></ins>
						</span>
					</a>
				</span>
			</span>
		</li>		
		@endforeach
	</ul>
	</div>

	<hr class="tall" />

	<div><h2>新品上架</h2></div>
	<ul class="products product-thumb-info-list" data-plugin-masonry="" style="position: relative; height: 1184px;">
	@foreach($newgoods as $k=>$v)
		<li class="col-md-3 col-sm-6 col-xs-12 product" style="position: absolute; left: 0px; top: 25px;list-style:none;margin:10px 10px">
			
			<span class="product-thumb-info">
				
				<a href="/goods/{{$v['id']}}">
					<span class="product-thumb-info-image">
						<span class="product-thumb-info-act">
							<span class="product-thumb-info-act-left"><em>查看</em></span>
							<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i>详情</em></span>
						</span>

						<img alt="" class="img-responsive" src="{{explode(',',$v['pic'])[0]}}" width="100%">
					</span>
				</a>
				<span class="product-thumb-info-content">
					<a href="/goods/{{$v['id']}}">
						<h4>{{$v['title']}}</h4>
						<span class="price">
							<del><span class="amount">$325</span></del>
							<ins><span class="amount">{{$v['price']}}</span></ins>
						</span>
					</a>
				</span>
			</span>
		</li>		
	@endforeach
	</ul>

</div>


</div>
</div>




<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-ribbon">
				<span>Get in Touch</span>
			</div>
			<div class="col-md-3">
				<div class="newsletter">
					<h4>Newsletter</h4>
					<p>Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.</p>

					<div class="alert alert-success hidden" id="newsletterSuccess">
						<strong>Success!</strong> You've been added to our email list.
					</div>

					<div class="alert alert-danger hidden" id="newsletterError"></div>

					<form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST">
						<div class="input-group">
							<input class="form-control" placeholder="Email Address" name="newsletterEmail" id="newsletterEmail" type="text">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit">Go!</button>
							</span>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-4">
				<div class="contact-details">
					<h4>Contact Us</h4>
					<ul class="contact">
						<li><p><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</p></li>
						<li><p><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-7890</p></li>
						<li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-md-2">
				<h4>Follow Us</h4>
				<div class="social-icons">
					<ul class="social-icons">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-1">
					<a href="index.html" class="logo">
						<img alt="Porto Website Template" class="img-responsive" src="/qiantai/img/logo-footer.png">
					</a>
				</div>
				<div class="col-md-7">
					<p>© Copyright 2014. All Rights Reserved.</p>
				</div>
				<div class="col-md-4">
					<nav id="sub-menu">
						<ul>
							<li><a href="page-faq.html">FAQ's</a></li>
							<li><a href="sitemap.html">Sitemap</a></li>
							<li><a href="contact-us.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>





<!-- Vendor -->

<script src="/qiantai/vendor/jquery/jquery.js"></script>
<script src="/qiantai/vendor/jquery.appear/jquery.appear.js"></script>
<script src="/qiantai/vendor/jquery.easing/jquery.easing.js"></script>
<script src="/qiantai/vendor/jquery-cookie/jquery-cookie.js"></script>
<script src="/qiantai/vendor/bootstrap/bootstrap.js"></script>
<script src="/qiantai/vendor/common/common.js"></script>
<script src="/qiantai/vendor/jquery.validation/jquery.validation.js"></script>
<script src="/qiantai/vendor/jquery.stellar/jquery.stellar.js"></script>
<script src="/qiantai/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/qiantai/vendor/jquery.gmap/jquery.gmap.js"></script>
<script src="/qiantai/vendor/twitterjs/twitter.js"></script>
<script src="/qiantai/vendor/isotope/jquery.isotope.js"></script>
<script src="/qiantai/vendor/owlcarousel/owl.carousel.js"></script>
<script src="/qiantai/vendor/jflickrfeed/jflickrfeed.js"></script>
<script src="/qiantai/vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/qiantai/vendor/vide/vide.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/qiantai/js/theme.js"></script>

<!-- Specific Page Vendor and Views -->
<script src="/qiantai/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="/qiantai/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/qiantai/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="/qiantai/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="/qiantai/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="/qiantai/js/theme.init.js"></script>

		
		
	</body>
</html>