@extends('layout.admin')

@section('title')
Quản lý danh mục
@endsection

@section('css')

@endsection


@section('content')

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

    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="#">Loại sản phẩm</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="post_form" method="post" action="" role="form">
            <div class="col-xs-12">
                <div class="form-group">
                    <!-- Single button -->

                    <a href="/admin/category/add" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>

                </div>
                <table id="type" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">ID</th>
                        <th>Tên loại sản phẩm</th>
                        <th class="hidden-xs">Loại sản phẩm gốc</th>
                        <th>Sửa</th>

                        <th>Xóa</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($categories) && count($categories))
                        @php $stt = 1; @endphp
                        @foreach($categories as $item)
                        <tr>
                            <td class="hidden-xs">{{ $stt }}</td>
                            <td>
                                <a href="new-type_product.html">{{ $item->name }}</a>
                            </td>
                            @foreach($categories as $item1)
                                @if($item1->id == $item->parent_id)
                                 <td class="hidden-xs">{!! $item1->name !!}</td>
                                @endif

                            @endforeach
                            @if($item->parent_id == 0)
                                <td class="hidden-xs"></td>
                            @endif
                            <td>
                                <a href="{{ route('admin.category.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa loại sản phẩm"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('admin.category.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa loại sản phẩm"></i></a>
                            </td>
                            <td>
                                @if($item->status==1)
                                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
                                @else
                                    <i class="fa fa-check text-danger" data-toggle="tooltip" data-placement="top" title="Không hiển thị"></i>
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
            $('#type').DataTable();
        } );

    </script>
@endsection


