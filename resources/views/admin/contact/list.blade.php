@extends('layout.admin')

@section('title')
Quản lý liên hệ
@endsection

@section('css')

@endsection


@section('content')

    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="#">Danh sách liên hệ</a></li>
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

                </div>
                <table id="type" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">Stt</th>
                        <th>Tên </th>
                        <th class="hidden-xs">Số điện thoại</th>
                        <th class="hidden-xs">Hộp thư</th>
                        <th class="hidden-xs">Nội dung</th>
                        <th>Tình trạng</th>
                        <th>Cập nhật trạng thái</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($contact) && count($contact))
                        @php $stt = 1; @endphp
                        @foreach($contact as $item)
                        <tr>
                            <td class="hidden-xs">{{ $stt }}</td>
                            <td>
                                <a >{{ $item->name }}</a>
                            </td>
                            <td>
                                <a >{{ $item->phone }}</a>
                            </td>
                            <td>
                                <a >{{ $item->email }}</a>
                            </td>
                            <td>
                                <a >{{ $item->content }}</a>
                            </td>
                            <td>
                                @if($item->status==1)
                                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đã phản hồi"></i>
                                @else
                                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Chưa phản hồi"></i>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.contact.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Thay đổi trạng thái liên hệ"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('admin.contact.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa loại sản phẩm"></i></a>
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


