@extends('layout.admin')

@section('title')
Quản lý slide
@endsection

@section('css')
    <style>
        .img-thumbnail{max-width: 100px;}
        .table th:nth-child(3), .table td:nth-child(3){text-align: center;}
    </style>
@endsection



@section('content')

    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="slider.html">Slider</a></li>
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
                    <a href="/admin/slide/add" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>

                </div>
                <table id="slider" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">STT</th>
                        <th>Hình ảnh</th>
                        <th class="hidden-sm hidden-xs">Nội dung</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($slide) && count($slide))
                        @php $stt = 1; @endphp
                        @foreach($slide as $item)
                        <tr>

                            <td class="hidden-xs">{!! $stt !!}</td>
                            <td>
                                <a href="#"><img class="img-thumbnail" src="{{asset($item->image)}}" alt="{!!$item->content!!}"></a>
                            </td>
                            <td class="hidden-sm hidden-xs">{!!$item->content!!}</td>
                            <td>
                                <a href="/admin/slide/edit/{!! $item->id !!}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Sửa slide"></i></a>
                            </td>
                            <td>
                                <a href="/admin/slide/delete/{!! $item->id !!}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa slide"></i></a>
                            </td>
                            <td>
                                @if($item->status==1)
                                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top" title="Đang hiển thị"></i>
                                @else
                                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top" title="Ẩn hiển thị"></i>
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
</div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#slider').DataTable();
        } );

    </script>
@endsection