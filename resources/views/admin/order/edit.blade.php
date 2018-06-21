@extends('layout.admin')

@section('title')
Quản lý hóa đơn
@endsection

@section('css')

@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="contact.html">Đơn hàng</a></li>
        <li class="active"><a href="view-contact.html">Đơn hàng  {{$order->id }} </a></li>
    </ol>
    <div class="col-xs-12">
        <strong>Chi tiết đơn hàng</strong> <span class="hidden-xs">({{ $order->id }})</span><br><small><i class="fa fa-calendar"></i> {{ $order->created_at }}</small>
        @if($order->status == 1)
            <span class="label label-info">Đã thanh toán</span>
        @else
            <span class="label label-info">Chưa thanh toán</span>
        @endif
        <hr>



        <div id="" class="col-md-6 text-justify">


            <p>Danh sách sản phẩm</p>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                </tr>
                </thead>
                <tbody>
                @php $stt = 1; $qty = 0; $total = 0; @endphp
                @if(isset($product) && count($product))

                    @foreach($product as $item)
                    <tr>
                        <td>{!! $stt !!}</td>
                        <td>{!! $item->name !!}</td>

                        <td>{!! $item->quantity !!}</td>
                        @php  $qty = $qty + $item->quantity; @endphp
                        <td>{!! number_format($item->price,0,",",".") !!} VNĐ</td>
                        @php  $total = $total+ $item->quantity * $item->price; @endphp
                    </tr>
                @php $stt++; @endphp
                    @endforeach
                @endif


                <tr>
                    <td></td>
                    <td></td>

                    <td><span class="label label-info">{!! $qty !!}</span>  </td>
                    <td> <span class="label label-info">{!! number_format($total,0,",",".") !!} VNĐ</span>  </td>
                </tr>

                </tbody>



            </table>


        </div>

        <div id="" class="col-md-6 text-justify">

            <div class="panel panel-info">

                <div class="panel-body">
                    <h4>Khách hàng</h4>

                    <p>Tên: <a href="/admin/order/customer/{!! $order->user_id !!}">{!! $user->name !!}</a></p>
                    <p>Mail: {!! $user->email !!}</p>
                    <p>SĐT: {!! $user->phone !!}</p>
                    <p>Địa chỉ: {!! $user->address !!}</p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">


            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 40px">
            <hr>
            <form action="{!! route('admin.order.store') !!}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name ="id" value="{{ $order->id }}">
                <select name="status" id="input" class=" btn-success" required="required" style="    padding: 6px;">
                    <option value="2" @if(isset($order)) @if($order->status!=1) selected @endif @endif>Chưa thanh toán</option>
                    <option value="1" @if(isset($order)) @if($order->status==1) selected @endif @endif>Đã thanh toán</option>
                </select>

                <button type="submit" class="btn btn-danger"><small><i class="fa fa-update"></i></small> Cập nhật</button>
                    
                  <a class="btn btn-danger" target="_blank" href="{{ route('admin.order.bill', ['id' => $id]) }}"><i class="fa fa-trash-o"></i> In hóa đơn</a> 
                <a class="btn btn-warning" href="/admin/order/list"><i class="fa fa-reply"></i> Trở về</a>
            </form>


        </div>




    </div>
@endsection

@section('script')
<script>
    function myFunction() {
        window.print();
    }
</script>
@endsection

