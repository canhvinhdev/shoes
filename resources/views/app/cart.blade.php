@extends('layout.app')
@section('title')
Giỏ hàng
@stop
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-top: 20px">
        <li>
            <a href="#">Home</a>
        </li>

        <li class="active">Giỏ hàng</li>
    </ol>

</div>

<div class="container">
    <div class="col-sm-12 col-md-12" style=" text-align: center;  background: whitesmoke;
    border-radius: 6px; ">


      @if( Cart::count() > 0) 
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Số lượng </th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Tổng</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

                <form method="POST">

                    <input name="_token"  type="hidden" value="{!! csrf_token() !!}">
                    @if(isset($content))
                    @foreach($content as $item)


                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                             <!--    <a class="thumbnail pull-left" href="/product/{{$item->id}}-{{str_slug($item->name)}}"> <img class="media-object" src='{!! asset($item->image) !!}' style="width: 72px; height: 72px;"> </a> -->
                                <div class="media-body">
                                    <h4 class="media-heading" style="padding-left: 20px; padding-top: 20px"><a href="">{{  $item->name }}</a></h4>

                                </div>
                            </div></td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                <input type="number" class="form-control" onchange="changeQty(this.value,'{{$item->rowId}}')" min="1" data-qty="{{ $item->qty }}"  id="qty" value='{{ $item->qty }}'  onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            </td>
                            <td class="col-sm-1 col-md-1 text-center"><strong>{{ number_format($item->price,0,"",".")  }} đ</strong></td>

                            <td class="col-sm-1 col-md-1 text-center"><strong>{{ number_format($item->price*$item->qty,0,"",".")  }} đ</strong></td>
                            <td class="col-sm-1 col-md-1">
                                <a href="{{ url('xoa-san-pham', ['id' => $item->rowId]) }}"><button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Xóa
                                </button>
                            </a>
                            </td>
                        </tr>



                        @endforeach

                    </form>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Tổng tiền</h5></td>
                        <td class="text-right"><h5><strong>{{ number_format(((float)str_replace(',','',$total)) ,0,"",".") }} đ</strong></h5></td>
                    </tr>

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                            <a href="/"> <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua sắm
                            </button></a></td>
                            <td>
                                <a href="/check-out"><button type="button" class="btn btn-success">
                                    Thanh toán <span class="glyphicon glyphicon-play"></span>
                                </button></a></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>


@else
<hr>
<img src="/app/images/cartisempty.png">
<hr>
@endif
                </div>
            </div>
            <script>
                function changeQty(val,id) {
                    $.ajax({
                        url:"{{ route('update') }}",
                        type:'POST',
                        cache: false,
                        data:{'id':id,'qty':val, '_token':$('input[name="_token"]').val()},
                        success: function(data){
                            setInterval(function(){  location.reload();}, 1000);
                        }
                        
                        });
                    
                }
            </script>
            @endsection
            @section('script')
           
            @endsection
