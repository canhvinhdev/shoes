@extends('layout.admin')

@section('title')
Quản lý khuyến mãi
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
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="/admin/promotion/list">Khuyến mãi</a></li>
        <li class="active"><a href="/admin/promotion/add">Thêm khuyến mãi mới</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="category-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" method="post" action="{{ route('admin.promotion.store') }}" >
            {{ csrf_field() }}
            <input name="id" type="hidden" @if(isset($promotion)) value="{{ $promotion->id }}" @endif >

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label required">Tên khuyến mãi</label>
                <div class="col-sm-9">
                    <input name="name" type="text" @if(isset($promotion)) value="{{ $promotion->name }}" @endif class="form-control" id="name" placeholder="Tên khuyến mãi" required="" maxlength="255">
                </div>
            </div>


           <div class="form-group">

            
                    <label class="col-sm-3 control-label required">Mô tả về khuyến mãi</label>
                    
                           <div class="col-sm-9">
                    <textarea class="form-control ckeditor"     placeholder="Nội dung khuyến mại" name="content" rows="3"> @if(isset($promotion))  {{ $promotion->content }}  @endif</textarea>
                </div>
                </div>
                

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label required">Ngày bắt đầu</label>
                <div class="col-sm-9">
                    <input name="start_day" type="date" @if(isset($promotion)) value="{{ date('m/d/Y', strtotime($promotion->start_day))}}" @endif class="form-control"  placeholder="Ngày bắt đầu" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label required">Ngày kết thúc</label>
                <div class="col-sm-9">
                    <input name="end_day" type="date" @if(isset($promotion)) value="{{ $promotion->end_day }}" @endif class="form-control"  placeholder="Ngày kết thúc" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="parent" class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-9">
                    <select class="form-control" name="statuses">
                        <option value="1"@if(isset($promotion)) @if($promotion->status==1) selected @endif @endif>ON</option>
                        <option value="2"@if(isset($promotion)) @if($promotion->status!=1) selected @endif @endif>OFF</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> @if(isset($promotion)) Sửa @else Thêm @endif</button>
                    <a class="btn btn-warning" href="/admin/promotion/list"><small><i class="fa fa-reply"></i></small> Trở về</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')

@endsection