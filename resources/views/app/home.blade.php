@extends('layout.app')
@section('title')
    Trang chủ
@stop
<?php
use Illuminate\Support\Facades\Storage;
?>

@section('content')
    @include('layout.slide')

<div class="container">

    <div class="row">
        <div class="col-md-12 text-center">

            <h3><strong>SẢN PHẨM NỔI BẬT</strong></h3>
        </div>

        @if(isset($product))
        @foreach($product as $data)
        <?php $total = null;?>

        @if(isset($discount))
        @foreach($discount as $item)
        <?php 
        
        if($item->product_id == $data->id){
            $total = $item;
        }
        
        ?>
        @endforeach
        @endif
        <!-- col // -->
        <div class="col-md-3">
            <figure class="card card-product">
                <figcaption class="info-wrap text-center">
                    <a href="/product/{{$data->id}}-{{str_slug($data->name)}}"><img src="{!! asset($data->image) !!}" class="img-responsive"></a>
                    @if(isset($total))
                        <img src="/app/images/sale.png" class="img_sale"   alt="">
                    @endif
                    <h6 class="title text-dots"><a href="/product/{{$data->id}}-{{str_slug($data->name)}}">{{$data->name}}</a></h6>
                    <div class="action-wrap">
                        <a href="/mua-hang/{{$data->id}}-{{str_slug($data->name)}}" class="btn btn-primary btn-sm float-right"> Mua hàng </a>
                        <div class="price-wrap h5">
                        @if(isset($total))
                            <span class="price-new">{!! number_format($data->price -($data->price * $total->number_discount/100),0,",",".") !!} VNĐ</span>
                            <span><s>{!! number_format($data->price,0,",",".") !!} VNĐ</s></span>
                        @else
                            <span class="price-new">{!! number_format($data->price,0,",",".") !!} VNĐ</span>
                        @endif
                        </div> <!-- price-wrap.// -->
                    </div> <!-- action-wrap -->
                </figcaption>
            </figure> <!-- card // -->
        </div> <!-- col // -->
        @endforeach
        @endif


    </div> <!-- row.// -->

</div>

<div class="container" style="padding-top: 20px">

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <img src="{!! asset('app/images/banner3.jpg') !!}" class="img-responsive">
        </div>
        <div class="col-md-4 col-xs-12">
            <img src="{!! asset('app/images/banner3.jpg') !!}" class="img-responsive">
        </div>
        <div class="col-md-4 col-xs-12">
            <img src="{!! asset('app/images/banner3.jpg') !!}" class="img-responsive">
        </div>
    </div>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-12 text-center">

            <h3><strong>GIÀY THỂ THAO NAM ĐẸP</strong></h3>
        </div>


        <!-- col // -->
        
        @if(isset($product_col))
        @foreach($product_col as $data)
        <?php $total = null;?>

        @if(isset($discount))
        @foreach($discount as $item)
        <?php 
        
        if($item->product_id == $data->id){
            $total = $item;
        }
        
        ?>
        @endforeach
        @endif
        <!-- col // -->
        <div class="col-md-3">
            <figure class="card card-product">
                <figcaption class="info-wrap text-center">
                    <a href="/product/{{$data->id}}-{{str_slug($data->name)}}"><img src="{!! asset($data->image) !!}" class="img-responsive"></a>
                    @if(isset($total))
                        <img src="/app/images/sale.png" class="img_sale"   alt="">
                    @endif
                    <h6 class="title text-dots"><a href="/product/{{$data->id}}-{{str_slug($data->name)}}">{{$data->name}}</a></h6>
                    <div class="action-wrap">
                        <a href="/mua-hang/{{$data->id}}-{{str_slug($data->name)}}" class="btn btn-primary btn-sm float-right"> Mua hàng </a>
                        <div class="price-wrap h5">
                        @if(isset($total))
                            <span class="price-new">{!! number_format($data->price -($data->price * $total->number_discount/100),0,",",".") !!} VNĐ</span>
                            <span><s>{!! number_format($data->price,0,",",".") !!} VNĐ</s></span>
                        @else
                            <span class="price-new">{!! number_format($data->price,0,",",".") !!} VNĐ</span>
                        @endif
                        </div> <!-- price-wrap.// -->
                    </div> <!-- action-wrap -->
                </figcaption>
            </figure> <!-- card // -->
        </div> <!-- col // -->
        @endforeach
        @endif



    </div> <!-- row.// -->

</div>

<div class="container news-blog">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1>Tin tức <small>Mới nhất </small></h1>
            </div>
            <div class="col-sm-6 col-md-6">
                <a href="#">
                    <div class="thumbnail principal-post">
                        <img src="https://i0.wp.com/radio.ufpa.br/wp-content/uploads/2017/09/Morador%20de%20rua.jpg">
                        <div class="caption">
                            <h4>Cách lựa chọn size phù hợp</h4>
                            <span class="date-of-post">4 de dezembro de 2017</span>
                            <p>Bất cứ một người đàn ông nào cũng thích ăn vận chỉn chu và luôn có sẵn một (vài) bộ suit lịch lãm trong tủ đồ dành cho những dịp trọng đại. Trang phục formal như vậy sẽ làm nổi bật sự nam tính và nét cuốn hút khó cưỡng của phái mạnh. Sự thanh lịch của cà vạt và bộ khuy măng - set luôn là những phụ kiện không thể thiếu cho bất kì bộ suit nào để chúng trở thành set đồ hoàn hảo - đây chính là món quà sinh nhật vừa ý nghĩa vừa hữu dụng cho chàng đấy</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6">
                @if(isset($new))
                @foreach($new as $item)
                <div class="thumbnail">
                    <a href="#">
                        <div class="caption">
                            <h4>{{$item->name}}</h4>
                            <span class="date-of-post">{{$item->created_at}}</span>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
