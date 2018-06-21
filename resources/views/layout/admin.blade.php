<!DOCTYPE html>
<html lang="vi">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <base href=".">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="favicon.png">
  <link href="{{ asset('adminlte/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('adminlte/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('adminlte/css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('adminlte/css/introjs.min.css') }}" rel="stylesheet">
  <link href="{{ asset('adminlte/css/jquery.dataTables.min.css') }}" rel="stylesheet">

  @yield('css')
  <script type="text/javascript" src="{{ asset('adminlte/js/jquery-1.10.2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('adminlte/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('adminlte/js/intro.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('adminlte/js/admin.js') }}"></script>
  <script src="{{ asset('adminlte/js/jquery.dataTables.min.js') }}"></script>
  @yield('script')
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><i class="fa fa-cogs"></i> GIAO DIỆN ADMIN</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <!-- <li><a href="#"><i class="fa fa-user"></i> Chỉnh sửa tài khoản</a></li> -->
          <li><a href="/logout"><i class="fa fa-power-off"></i> Đăng xuất</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
<div class="clearfix">
  <div id="sidebar-bg"></div>
  <div id="sidebar" role="navigation">
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">
            <i class="fa fa-th"></i><span> Danh mục quản lý</span>
            <b class="fa fa-plus-sign visible-xs pull-right"></b>
          </h3>
      </div>
      <ul id="menu" class="list-group">

        <li class="list-group-item">
          <a href="/admin/category/list">
            <i class="fa fa-bars"></i> <span>DANH MỤC SẢN PHẨM</span>
          </a>
        </li>

        <li class="list-group-item">
          <a href="/admin/product/list">
            <i class="fa fa-bars"></i><span>DANH SÁCH SẢN PHẨM</span>
          </a>
        </li>
         <li class="list-group-item">
          <a href="/admin/order/list">
            <i class="fa fa-fire"></i><span>ĐƠN HÀNG</span>
          </a>
        </li>

          <li class="list-group-item">
              <a href="/admin/promotion/list">
                  <i class="fa fa-fire"></i><span>CHƯƠNG TRÌNH KHUYẾN MÃI</span>
              </a>
          </li>

       


        <li class="list-group-item">
          <a href="/admin/new/list">
            <i class="fa fa-edit"></i> <span>BẢN TIN</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/admin/slide/list">
            <i class="fa fa-picture-o"></i> <span>KHỐI SLIDER ẢNH</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/admin/contact/list">
            <i class="fa fa-user"></i> <span>LIÊN HỆ</span>
          </a>
        </li>
        <li class="list-group-item">
          <a href="/admin/user/list">
            <i class="fa fa-user"></i> <span>TÀI KHOẢN NGƯỜI DÙNG</span>
          </a>
        </li>
    
      </ul>
    </div>
  </div>
  <div id="main"><!--Phần chứa nội dung chính-->
    @yield('content')

  </div>
  <!--END #main-->
</div>
</body>
</html>
