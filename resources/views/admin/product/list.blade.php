@extends('layout.admin')

@section('title')
Quản lý Tin Tức
@endsection

@section('css')
@endsection


@section('action')

@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="product.html">Sản phẩm</a></li>
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
                    <!-- Single button -->

                    <a href="/admin/product/add" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>

                </div>
                <table id="product" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">ID</th>
                        <th>Sản phẩm</th>
                        <th class="hidden-sm hidden-xs">Mô tả</th>
                        <th class="hidden-sm hidden-xs">Giá</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($product) && count($product))
                        @php $stt = 1; @endphp
                        @foreach($product as $item)
                        <tr>
                            <td class="hidden-xs">{{ $stt }}</td>
                            <td>
                                <a href="/admin/product/edit/{{ $item->id }}">{{ $item->name }}</a>
                            </td>
                            <td class="hidden-sm hidden-xs">{!!  $item->description !!}</td>
                            <td class="hidden-sm hidden-xs">{{ $item->price }}</td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa sản phẩm"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('admin.product.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa sản phẩm"></i></a>
                            </td>

                            <td>
                               @if($item->status == 1)
                                    <i class="fa fa-times text-success" data-toggle="tooltip" data-placement="top" title="Hiển thị với người dùng"></i>
                                @else
                                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Đã ẩn với người dùng"></i>
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
    <script type="text/javascript">

        $(document).ready( function () {
            $('#product').DataTable();
        } );

    </script>
@endsection