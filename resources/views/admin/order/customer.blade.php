@extends('layout.admin')

@section('title')
    Quản lý hóa đơn
@endsection

@section('css')

@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="/admin/user/list">Khách hàng</a></li>
        <li class="active"><a href="#">Thông tin khách hàng : {{$user->name}}</a></li>
    </ol>
    <div class="col-xs-12">
        <strong>Khách hàng</strong> <span class="hidden-xs">({{$user->name}})</span><br><small><i class="fa fa-calendar"></i> {{$user->created_at}}</small>
        <span class="label label-info">  @if(isset($order) ) {!! count($order) !!} @endif</span>
        <hr>



        <div id="" class="col-md-6 text-justify">


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
                @if(isset($order) && count($order))
                    @php $stt = 1; @endphp
                    @foreach($order as $item)
                    <tr>
                        <td>{!! $stt !!}</td>
                        <td><a href="/admin/order/edit/{!! $item->id !!}">{!! $item->code !!}</a></td>

                        <td>{!! $item->created_at !!}</td>
                        @if($item->status == 1)
                            <th><span class="label label-success">Đã thanh toán</span></th>
                        @else
                            <th><span class="label label-danger">Chưa thanh toán</span></th>
                        @endif
                        <td>{!! $item->price_all !!}</td>
                    </tr>
                    </tr>
                    @php $stt++; @endphp
                    @endforeach
                @endif

                </tbody>



            </table>


        </div>

        <div id="" class="col-md-6 text-justify">

            <div class="panel panel-info">

                <div class="panel-body">
                    <h4>Khách hàng</h4>

                    <p>Tên: <a href="/admin/user/edit/{!! $user->id !!}">{{$user->name}}</a></p>
                    <p>Mail: {{$user->name}}</p>
                    <p>SĐT: {{$user->phone}}</p>
                    <p>Địa chỉ: {{$user->address}}</p>
                    <p>Ngày sinh: {{$user->birtday}}</p>
                    <p>Ngày tạo: {{$user->created_at}}</p>
                    <hr>
                    <button type="button" class="btn btn-info"><a href="/admin/user/edit/{!! $user->id !!}">Sửa</a></button>
                </div>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">


            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 40px">
            <hr>





            <a class="btn btn-warning" href="#"><i class="fa fa-reply"></i> Trở về</a>


        </div>




    </div>

@endsection

@section('script')

@endsection

