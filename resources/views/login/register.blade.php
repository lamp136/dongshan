<!DOCTYPE html>
<html>
  
  <head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>前台登录注册</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Web Fonts -->
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
    <!-- Skin CSS -->
    <link rel="stylesheet" href="/qiantai/css/skins/default.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="/qiantai/css/custom.css">
    <!-- Head Libs -->
    <script src="/qiantai/vendor/modernizr/modernizr.js"></script>
    <!--[if IE]>
      <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
    <!--[if lte IE 8]>
      <script src="vendor/respond/respond.js"></script>
      <script src="vendor/excanvas/excanvas.js"></script>
    <![endif]--></head>
  
  <body>
    <div class="body">
     
      {!!App\Http\Controllers\layoutcontroller::header()!!}
       @section('main')
      <div role="main" class="main">
        <section class="page-top">
       
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li>
                    <a href="#">Home</a></li>
                  <li class="active">Pages</li></ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h2>注册用户</h2></div>
            </div>
          </div>
        </section>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="row featured-boxes login">
                <div class="col-sm-offset-3 col-sm-6">
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
                  <!-- 验证码提醒 -->
                  @if (session('error'))
                      <div class="alert alert-danger">
                          <ul>
                              <li>{{session('error')}}</li>
                          </ul>
                      </div>
                  @endif
                      <h4>注册账号</h4>
                      <form action="/register" id="" method="post">
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-12">
                              <label>邮箱</label>
                              <input type="text" name='email' value="" class="form-control input-lg"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-12">
                              <label>密码</label>
                              <input type="password" name='password' value="" class="form-control input-lg"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-12">
                              <label>确认密码</label>
                              <input type="password" name="repassword" value="" class="form-control input-lg"></div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group">
                            <div class="col-md-6">
                              <label>验证码</label>
                              <input type="text" name="vcode" value="" class="form-control input-lg"></div>    
                              <div class='col-md-6' style='padding-top:30px;'>
                                <img src="{{ URL('/vcode') }}" onclick="this.src=this.src+'?a=1'">
                              </div>
                          </div>
                        </div>
                        {{csrf_field()}}
                        <div class="row">
                          <div class="col-md-12">
                            <input type="submit" value="提交" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading..."></div>
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
      @show
   
    <footer id="footer" style='border-top:0px;padding:0px;'>
        
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
    <!-- Theme Custom -->
    <script src="/qiantai/js/custom.js"></script>
    <!-- Theme Initialization Files -->
    <script src="/qiantai/js/theme.init.js"></script>
    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-12345678-1']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
    -->
  </body>

</html>