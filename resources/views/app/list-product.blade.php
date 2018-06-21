@extends('layout.app')
@section('title')
    Trang chi tiết
@stop
<?php
use Illuminate\Support\Facades\Storage;
?>
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-top: 20px">
        <li>
            <a href="/">Home</a>
        </li>
        <li class="active">
            {{$data->name}}
        </li>
    </ol>

</div>

<div class="container">

    <div class="row">

       
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
        <div class="col-md-4">
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

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        {!! $product->links() !!}
    </div>
</div>
@endsection