@extends('layout.admin')

@section('title')
Quản lý đơn hàng
@endsection

@section('css')

@endsection



@section('content')

    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="product.html">Đơn hàng</a></li>
    </ol>
    <div class="col-xs-12">
        @if (session('message'))
            <div class="alert alert-error">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!!session('message') !!}
            </div>
        @endif

        @if (session('message_table'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {!!session('message_table') !!}
            </div>
        @endif
        <form id="post_form" method="post" action="" role="form">
            <div class="col-xs-12">
                <div class="form-group">
                </div>
                <table id="product" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">ID</th>
                        <th class="hidden-xs">Mã Hóa đơn</th>
                        <th>Khách hàng</th>
                        <th class="hidden-sm hidden-xs">Tổng tiền</th>
                        <th class="hidden-sm hidden-xs">Ngày đặt</th>



                        <th>Cập nhật đơn hàng</th>
                        <th>Kiểu thanh toán</th>
                        <th>Xóa đơn hàng</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($order) && count($order))
                        @php $stt = 1; @endphp
                        @foreach($order as $item)

                        
                        <tr>

                            <td class="hidden-xs">1</td>
                            <td class="hidden-xs"><a href="{{ route('admin.order.edit', ['id' => $item->id]) }}">HOADON--{!! $item->id !!}</a></td>
                            <td>
                                {!! $item->name !!}
                            </td>
                            <td class="hidden-sm hidden-xs"> 
<label class="label-success" style="padding: 5px; color: #fff">   {{ number_format($item->price_all,0,"",".")  }} đ</label>
                          </td>
                            <td class="hidden-sm hidden-xs">{!! $item->created_at !!}</td>
                            <td>
                                <a href="{{ route('admin.order.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa hóa đơn"></i></a>
                            </td>


                            <td>
                                @if($item->method == 0)
                                    THANH TOÁN TRỰC TIẾP
                                @else
                                    THANH TOÁN QUA ATM
                                @endif 

                            </td>
                            <td>
                                <a href="{{ route('admin.order.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa hóa đơn"></i></a>
                            </td>
                            <td>
                                @if($item->status == 1)
                                     <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
                                @else
                                    <i class="fa fa-check text-danger" data-toggle="tooltip" data-placement="top" title="Ẩn hiển thị"></i>
                                @endif
                            </td>
                        </tr>
                        @php $stt++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </form>
    </div>

@endsection

@section('script')

@endsection


