@extends('layout.app')
@section('title')
    Thanh toán
@stop
@section('content')
<div class="container">
    <div class="row">


        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="panel panel-info">

                <div class="panel-body">
                    <h4>Khách hàng</h4>

                    <p>Tên: <a href="/cap-nhat-thong-tin-khach-hang">{{ $users->name }}</a></p>
                    <p>Mail: {{ $users->email }}</p>
                    <p>SĐT: {{ $users->phone }}</p>
                    <p>Địa chỉ: {{ $users->address }}</p>
                 
                    <p>Ngày tạo:{{ $users->created_at }}</p>
                    <hr>
                    <button type="button" class="btn btn-info"><a href="/cap-nhat-thong-tin-khach-hang">Sửa</a></button>
                </div>
            </div>
        </div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <div class="panel panel-info">

                <div class="panel-body">
                    <p>Danh sách đơn hàng</p>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>

                            <th>Ngày tạo</th>
                            <th>Tình trạng</th>
                            <th>Giá</th>
                        </tr>
                        </thead>
                        <tbody>

                    @if (isset($order))
                    @foreach($order as $item)


                        <tr>
                            <td>1</td>
                            <td><a href="">{{ $item->id }}</a></td>

                            <td>{{ $item->created_at }}</td>
                            <th><span class="label label-success">
                                
                                @if($item->status == 1)
                                    <span class="label label-info">Đã thanh toán</span>
                                @else
                                    <span class="label label-info">Chưa thanh toán</span>
                                @endif


                            </span></th>
                            <td>{{ $item->price_all }} </td>



                        </tr>
                    @endforeach

                    @else

<tr>
<div class="co-md-12 text-center">
    Hiện tại không có đơn hàng nào
</div>
</tr>
@endif
                        </tbody>



                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection