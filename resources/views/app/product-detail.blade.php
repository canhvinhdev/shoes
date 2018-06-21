@extends('layout.app')
@section('title')
Trang chi tiết
@stop
<?php
use Illuminate\Support\Facades\Storage;
?>
@section('content')

<br>
<div class="container">


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/list/{{$data->id}}-{{str_slug($data->name)}}">{!! $data->name !!}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{!! $product->name !!}</li>
        </ol>
    </nav>
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1"><img src="{!! asset($product->image) !!}" /></div>
                        <div class="tab-pane" id="pic-2"><img src="{!! asset($product->image) !!}" /></div>
                        <div class="tab-pane" id="pic-3"><img src="{!! asset($product->image) !!}" /></div>
                        <div class="tab-pane" id="pic-4"><img src="{!! asset($product->image) !!}" /></div>
                        <div class="tab-pane" id="pic-5"><img src="{!! asset($product->image) !!}" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                        <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="{!! asset($product->image) !!}" /></a></li>
                        <li><a data-target="#pic-2" data-toggle="tab"><img src="{!! asset($product->image) !!}" /></a></li>
                        <li><a data-target="#pic-3" data-toggle="tab"><img src="{!! asset($product->image) !!}" /></a></li>
                        <li><a data-target="#pic-4" data-toggle="tab"><img src="{!! asset($product->image) !!}" /></a></li>
                        <li><a data-target="#pic-5" data-toggle="tab"><img src="{!! asset($product->image) !!}" /></a></li>
                    </ul>

                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{!! $product->name !!}</h3>
                    <div class="rating">


                    </div>
                    <p class="product-description">{!! $product->description !!}</p>




                    @if(isset($product_promtion))
                    <h4 class="price">Giá hiện tại:
                        <s> <span>{!! number_format($product->price,0,",",".") !!} VNĐ</span></s>
                    </h4>

                    <h4 class="price">Giá áp dụng khuyến mãi:
                       <span>{!! number_format($product->price - ($product->price * $product_promtion->number_discount/100 ),0,",",".")  !!} VNĐ</span>
                   </h4>
                   @else
                   <h4 class="price">Giá hiện tại: <span>{!! number_format($product->price,0,",",".") !!} VNĐ</span></h4>
                   @endif





                 <!--   <h5 class="sizes">Các loại cỡ:
                    <span class="size" data-toggle="tooltip" title="small">S</span>
                    <span class="size" data-toggle="tooltip" title="medium">M</span>
                    <span class="size" data-toggle="tooltip" title="large">L</span>
                    <span class="size" data-toggle="tooltip" title="xtra large">XL</span>
                </h5> -->

                <div class="action">
                    <form id="add-item-form" action="/mua-hang" method="post" >
                        {{ csrf_field() }}
                        <input name="id" value="{{$product->id}}" class="tc item-quantity" type="hidden">




                        <button class="add-to-cart btn btn-default" type="button">  <a href="/mua-hang/{{$product->id}}-{{str_slug($product->name)}}"> Thêm vào giỏ hàng </a></button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </form>
<hr>
                    <div class="col-lg-12 col-md-12 col-xs-12 no_padding deliver-module">
                            <div class="item deliver-top-support">
                                <p style="font-family:Roboto-Regular;">Gọi tổng đài để mua nhanh hơn</p>
                                <p> 
                                    <a class="call_easyshopping" href="javascript:;" title="Dễ dàng mua sắm">
                                     +   1800 1111</a> 
                                    <b>(8:30 - 21:30)</b> <span>mỗi ngày</span>
                                </p>
                            </div>
                            <div class="item deliver-top-info hidden">
                                <p><b>Sẽ có tại nhà bạn</b> từ 1-5 ngày làm việc</p>
                            </div>
                            <div class="item deliver-top-on">
                                
                                <p class="">
                                    <a class="call_freeshipping" href="javascript:;" title="Miễn phí giao hàng toàn quốc">
                                     +   Miễn phí giao hàng toàn quốc
                                    </a> (Sản phẩm trên 300,000đ)
                                </p>
                            </div>
                            <div class="item deliver-top-payment">
                                
                                <p>
                                    <a class="call_easypayment" href="javascript:;" title="Thanh toán tiện lợi">
                                     +   Thanh toán tiện lợi
                                    </a> (nhiều hình thức thanh toán)
                                </p>

                            </div>
                            <div class="item deliver-top-policy">
                                
                                <p>
                                    <a class="call_easyremind" href="javascript:;" title="Đổi trả dễ dàng">
                                     +   Đổi trả dễ dàng
                                    </a> 
                                    
                                    + Đổi trả 90 ngày cho giày và 30 ngày cho túi
                                </p>
                            </div>
                            <div id="easy_payment" class="modal fade" role="dialog" style="background: rgba(0, 0, 0, 0.5);z-index: 999999;">
                                <div class="modal-dialog modal-dialog-size" style="padding-top:2%;width:700px !important">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                            <div class="modal-title"></div>
                                        </div>
                                        <div class="modal-body no-padding">
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                </div>
                @if(isset( $product_promtion->content ))

                <div class="quatang">


                    {{ $product_promtion->content }}        

                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Bình luận sản phẩm</a></li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <br>
            {!!$product->content !!}
        </div>
        <div role="tabpanel" class="tab-pane" id="profile"><br>Bình luận sản phẩm

            <div class="container-fluid">
               <div id="fb-root"></div>					
               <div class="fb-comments" data-href="" data-numposts="5" width="100%" data-colorscheme="light"></div>
               <!-- script comment fb -->
               <script type="text/javascript">(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                  fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));
          </script>
      </div>

  </div>


</div>

</div>
</div>


<div class="container">

    <div class="row">



        <div class="col-md-12 text-center">

            <h3><strong>SẢN PHẨM LIÊN QUAN</strong></h3>
        </div>
        <!-- col // -->
        @if(isset($related_products))
        @foreach($related_products as $data)
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


@endsection