<!DOCTYPE html>

        <html lang="en">
        <!--<![endif]-->
        
        <head>
          <meta charset="utf-8">
          <!-- Viewport Metatag -->
          <meta name="viewport" content="width=device-width,initial-scale=1.0">
          <!-- Plugin Stylesheets first to ease overrides -->
          <link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
          <!-- Required Stylesheets -->
          <link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">
          <!-- Demo Stylesheet -->
          <link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">
          <!-- jQuery-UI Stylesheet -->
          <link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">
          <!-- Theme Stylesheet -->
          <link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
          <link rel="stylesheet" type="text/css" href="/admin/css/my.css" media="screen">
          <title>后台管理系统</title></head>
        
        <body>
          <!-- Themer (Remove if not needed) -->
          <div id="mws-themer">
            <div id="mws-themer-css-dialog">
              <form class="mws-form">
                <div class="mws-form-row">
                  <div class="mws-form-item">
                    <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- Themer End -->
          <!-- Header -->
          <div id="mws-header" class="clearfix">
            <!-- Logo Container -->
            <div id="mws-logo-container">
              <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
              <div id="mws-logo-wrap">
                <img src="/admin/images/mws-logo.png" alt="mws admin"></div>
            </div>
            <!-- User Tools (notifications, logout, profile, change password) -->
            <div id="mws-user-tools" class="clearfix">
              <!-- Notifications -->
              
              <!-- Messages -->
              
              <!-- User Information and functions section -->
              <div id="mws-user-info" class="mws-inset">
                <!-- User Photo -->
                <div id="mws-user-photo">
                  <img src="/admin/example/profile.jpg" alt="User Photo"></div>
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                  <div id="mws-username">你好, {{session('name')}}</div>
                  <ul>
                  <li>
                      <a href="/admins">首页</a></li>
                    <li>
                      <a href="/dologout">退出登录</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Main Wrapper -->
          <div id="mws-wrapper">
            <!-- Necessary markup, do not remove -->
            <div id="mws-sidebar-stitch"></div>
            <div id="mws-sidebar-bg"></div>
            <!-- Sidebar Wrapper -->
            <div id="mws-sidebar">
              <!-- Hidden Nav Collapse Button -->
              <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <!-- Searchbox -->
              <div id="mws-searchbox" class="mws-inset">
                <form action="typography.html">
                  <input type="text" class="mws-search-input" placeholder="Search...">
                  <button type="submit" class="mws-search-submit">
                    <i class="icon-search"></i>
                  </button>
                </form>
              </div>
              <!-- Main Navigation -->
              <div id="mws-navigation" class="user" res="{{session('res')}}">
                <ul >
                  <li>
                    <a href="#">
                      <i class="icon-user"></i>用户管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/admins/user/add">用户添加</a></li>
                      <li>
                        <a href="/admins/user/index">用户列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div id="mws-navigation" class="article">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-t-shirt"></i>文章分类管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/admins/fenlei/add">文章分类添加</a></li>
                      <li>
                        <a href="/admins/fenlei/index">文章分类列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
                <div id="mws-navigation" class="article">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file" ></i>文章管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/admins/article/add">文章添加</a></li>
                      <li>
                        <a href="/admins/article/index">文章列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

            <div id="mws-navigation" class='goods'>
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file"></i>商品分类管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/admins/cate/add">商品分类添加</a></li>
                      <li>
                        <a href="/admins/cate/index">商品分类列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>

              <div id="mws-navigation" class="goods">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file"></i>商品管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/admins/goods/add">商品添加</a></li>
                      <li>
                        <a href="/admins/goods/index">商品列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div id="mws-navigation" class="images">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file"></i>轮播图管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/lunbo/add">添加图片</a></li>
                      <li>
                        <a href="/lunbo/index">图片列表</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
               <div id="mws-navigation" class="role">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file"></i>角色管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/Role/add">添加角色</a></li>
                      <li>
                        <a href="/Role/index">角色列表</a></li>
                        
                    </ul>
                  </li>
                </ul>
              </div>
              <div id="mws-navigation" class="permission">
                <ul class="closed">
                  <li>
                    <a>
                      <i class="icon-file"></i>权限管理</a>
                    <ul class="closed">
                      <li>
                        <a href="/Permission/add">添加权限</a></li>
                      <li>
                        <a href="/Permission/index">权限列表</a></li>
                        
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Main Container Start -->
            <div id="mws-container" class="clearfix">
              <!-- Inner Container Start -->
              <div class="container">


                  @if(session('error'))
                  <div class="mws-form-message error">
                        {{session('error')}}    
                   </div>
                  @endif

                  @if(session('success'))
                  <div class="mws-form-message success">
                        {{session('success')}}    
                   </div>
                  @endif

                   
                  
                  @yield('content')
                  <!-- @yield('index') -->
              </div>
            </div>
            <!-- JavaScript Plugins -->
            <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
            <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
            <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
            <script src="/admin/custom-plugins/fileinput.js"></script>
            <!-- jQuery-UI Dependent Scripts -->
            <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
            <script src="/admin/jui/jquery-ui.custom.min.js"></script>
            <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>
            <!-- Plugin Scripts -->
            <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
            <!-- Core Script -->
            <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
            <script src="/admin/js/core/mws.js"></script>
            <!-- Themer Script (Remove if not needed) -->
            <script src="/admin/js/core/themer.js"></script>
            <!-- Demo Scripts (remove if not needed) -->
            <script type="text/javascript">$(function() {
                $.fn.tabs && $('.mws-tabs').tabs();
              });</script>

            <!-- 检测登录用户权限 -->
            <script type="text/javascript">
                var res = $('.user').attr('res');
                if(res=='goods'){
                  $('.goods').siblings().css('display','none');
                  $('.goods').show();
                }

                if(res=='article'){
                  $('.article').siblings().css('display','none');
                  $('.article').show();
                }

                if(res=='images'){
                  $('.images').siblings().css('display','none');
                  $('.images').show();
                }

            </script>
            
            @yield('myjs')
        </body>
        
 </html>