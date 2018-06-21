<?php

use App\Models\Category;

$category = Category::where('status', '=', 1)->get();
?>

<nav class="navbar navbar-default" role="navigation">


    <div class="container">
      <div class="container">
        <div class="row flex">
            <div class="col-md-4 col-sm-5">
                <!-- HEADER TOP MENU -->
                <div class="header-top-menu">

                    <ul class="list-unstyled list-inline">
                        <?php  $user = Auth::user();?>
                        @if(isset($user))
                        <li><a href="/khach-hang"><i class="fa fa-lock"></i>{!! $user->name !!}</a></li>
                        <li><a href="/thoat"><i class="fa fa-user"></i>Thoát</a></li>
                        @else
                        <li><a href="/dang-nhap"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                        <li><a href="/dang-ky"><i class="fa fa-user"></i> Đăng ký</a></li>
                        @endif
                      <li><a href="/gio-hang"><i class="fa fa-cart-plus"></i> Giỏ hàng</a></li>
                    </ul>
                    
                </div>
                <!-- HEADER TOP MENU -->
            </div>

            <div class="col-md-4 col-sm-4">
                <!-- SECRCH FORM -->
                <div class="header-search-form text-right">
                <img src="/app/images/logo.png" class="img-responsive">
                </div>
                <!-- SECRCH FORM -->
            </div>
            <div class="col-md-4 footer-widget">
                <div class="social-area">
                    <ul class="socila_icon">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
         
       </div>
   </div>



   <!-- Brand and toggle get grouped for better mobile display -->



   <!-- Collect the nav links, forms, and other content for toggling -->
   <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="/">Trang chủ</a></li>
        <li><a href="/gioi-thieu">Giới thiệu</a></li>
        @if(isset($category))
        @foreach($category as $item)
        {{--
            <li><a href="#news">{{$item->name}}</a></li>
            --}}
            <li class="dropdown">
                @if($item->parent_id == 0)
                <a href="/danh-sach-san-pham/{{$item->id}}-{{str_slug($item->name)}}">{{$item->name}}<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @foreach($category as $data)
                    @if($item->id == $data->parent_id)
                    <li><a href="/danh-sach-san-pham/{{$data->id}}-{{str_slug($data->name)}}">{{$data->name}}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
                @endif
            </li>

            @endforeach
            @endif
            <li><a href="/lien-he">Liên hệ</a></li>
        
            

        </ul>


        <form action="{!! route('search') !!}" method="post" class="navbar-form clearfix navbar-right" role="search">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nhập từ khóa">
            </div>
            <button type="submit" class="btn search_btn btn-default">Tìm kiếm</button>
        </form>

    </div><!-- /.navbar-collapse -->


</div>
</nav>