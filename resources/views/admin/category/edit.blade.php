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
        <form id="category-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" method="post" action="{{ route('admin.category.store') }}" >
            {{ csrf_field() }}
            <input name="id" type="hidden" @if(isset($category)) value="{{ $category->id }}" @endif >

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label required">Tên loại sản phẩm</label>
                <div class="col-sm-9">
                    <input name="name" type="text" @if(isset($category)) value="{{ $category->name }}" @endif class="form-control" id="name" placeholder="Tên danh mục" required="" maxlength="255">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label required">Mô tả </label>
                <div class="col-sm-9">
                    <textarea name="description" rows="5" class="form-control" id="description" placeholder="Mô tả về loại sản phẩm (~ 120 kí tự)" >@if(isset($category)) {{$category->description}} @endif</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="parent" class="col-sm-3 control-label">Loại sản phẩm gốc</label>
                <div class="col-sm-9">
                    <select class="form-control" name="parent_id">
                        <option value= "0" >Loại sản phẩm gốc</option>
                        @if(isset($data))
                            @foreach($data as $item)
                                <option value="{{$item->id}}"@if(isset($category)) @if($category->parent_id==$item->id) selected @endif @endif>{{$item->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="parent" class="col-sm-3 control-label">Trạng thái</label>
                <div class="col-sm-9">
                    <select class="form-control" name="statuses">
                        <option value="1"@if(isset($category)) @if($category->status==1) selected @endif @endif>ON</option>
                        <option value="2"@if(isset($category)) @if($category->status!=1) selected @endif @endif>OFF</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> @if(isset($category)) Sửa @else Thêm @endif</button>
                    <a class="btn btn-warning" href="/admin/category/list"><small><i class="fa fa-reply"></i></small> Trở về</a>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('script')

@endsection