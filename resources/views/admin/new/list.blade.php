@extends('layout.admin')

@section('title')
Quản lý Tin Tức
@endsection

@section('css')

@endsection


@section('content')

    <ol class="breadcrumb" id="step2">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="post.html">Bài viết</a></li>
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
        <form id="admin-form" method="post" action="" role="form">
            <div class="col-xs-12">
                <div class="form-group">
                    <!-- Single button -->

                    <a href="/admin/new/add" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>
                    <div class="btn-group pull-right hidden-xs" id="div-search">
                        <input id="search" name="search" type="text" value="" class="form-control" placeholder="Tìm kiếm">
                        <span class="fa fa-search"></span>
                    </div>
                </div>
                <table class="table table-bordered table-hover" id="type">
                    <thead>
                    <tr>

                        <th class="hidden-xs">ID</th>
                        <th>Bài viết</th>
                        <th class="hidden-sm hidden-xs">Ngày đăng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($new) && count($new))
                        @php $stt = 1; @endphp
                            @foreach($new as $item)
                            <tr>

                                <td class="hidden-xs">{{ $stt }}</td>
                                <td>
                                    <a href="/admin/new/edit/{{ $item->id}}">{{ $item->name }}</a>
                                </td>
                                <td class="hidden-sm hidden-xs">{!! $item->created_at !!}</td>
                                <td>
                                    <a href="{{ route('admin.new.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa bài viết"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.new.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa sản phẩm"></i></a>
                                </td>
                                <td>
                                    @if($item->status == 1)
                                        <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
                                    @else
                                        <i class="fa fa-check text-danger" data-toggle="tooltip" data-placement="top" title="Ẩn với người dùng"></i>
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
 >
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#type').DataTable();
        } );

    </script>
@endsection