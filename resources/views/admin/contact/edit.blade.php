@extends('layout.admin')

@section('title')
Quản lý danh muc
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
        <li class="active"><a href="/admin/category/list">Loại sản phẩm</a></li>
        <li class="active"><a href="/admin/category/add">Thêm loại sản phẩm mới</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="category-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" method="post" action="{{ route('admin.contact.store') }}" >
            {{ csrf_field() }}
            <input name="id" type="hidden" @if(isset($contact)) value="{{ $contact->id }}" @endif >
            <div class="form-group">
                <label for="parent" class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status">
                        <option value="1"@if(isset($contact)) @if($contact->status==1) selected @endif @endif>Phản hồi</option>
                        <option value="2"@if(isset($contact)) @if($contact->status!=1) selected @endif @endif>Chưa phản hồi</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> @if(isset($contact)) Sửa @else Thêm @endif</button>
                    <a class="btn btn-warning" href="/admin/contact/list"><small><i class="fa fa-reply"></i></small> Trở về</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')

@endsection