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
<div class="panel-heading">
	<div class="panel-title col-md-5">Danh sách khuyến mại</div>
	<div class="form-group">
                    <!-- Single button -->

                    <a href="/admin/promotion/add" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> Thêm mới</a>

                </div>
</div>






<div class="panel-body">
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="active">
				<th>STT</th>
				<th>Chương trình khuyến mãi</th>
				<th>Ngày bắt đầu</th>
				<th>Ngày kết thúc</th>
				<th>Cấu hình</th>
				<th>Sửa</th>
				<th>Xóa</th>
			</tr>
		</thead>
		<tbody>
		@if(isset($promotion) && count($promotion))
                        @php $stt = 1; @endphp
                        @foreach($promotion as $item)
					<tr class="odd gradeX">
						<td>{{ $stt }}</td>
						<td>  {{ $item->name }}</td>
						<td> 
							{{ date('d/m/Y', strtotime($item->start_day))}}
						</td>
						<td> {{ date('d/m/Y', strtotime($item->end_day))}}</td>		
						<td class="center">

							 <a href="{{ route('admin.promotion.config', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Cấu hình"></i></a>

							</td>

								<td class="center">
								<a href="{{ route('admin.promotion.edit', ['id' => $item->id]) }}"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Cấu hình"></i></a>
							</td>
								<td class="center">
								<a href="{{ route('admin.promotion.delete', ['id' => $item->id]) }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa"></i></a>

							</td>
						</td>
					</tr>
					@php $stt++; @endphp
                        @endforeach
                    @endif
				</tbody>
			</table>
		</div>

		@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready( function () {
            $('#type').DataTable();
        } );

    </script>
@endsection
