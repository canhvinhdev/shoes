@extends('layout.admin')

@section('title')Quản lý sản phẩm
@endsection

@section('css')
@endsection

@section('content')

<ol class="breadcrumb">
    <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
    <li class="active"><a href="/admin/product/list">Sản phẩm</a></li>
    <li class="active"><a href="/admin/product/add">Thêm sản phẩm mới</a></li>
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

    <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post"
          action="{{ route('admin.product.store') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <input name="id" type="hidden" @if(isset($product)) value="{{ $product->id }}" @endif>
        <div class="form-group">
            <label for="type_product" class="col-sm-3 control-label required">Loại sản phẩm</label>
            <div class="col-sm-9">
                <select name="category_id" class="form-control">
                    @if(isset($categories))
                    @foreach($categories as $item)
                    <option value="{{$item->id}}" @if(isset($product)) @if($product->category_id==$item->id) selected
                        @endif @endif>{{$item->name}}
                    </option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="masp" class="col-sm-3 control-label required">Tên sản phẩm</label>
            <div class="col-sm-9">
                <input name="name" type="text" @if(isset($product)) value="{{ $product->name }}" @endif
                       class="form-control" id="masp" placeholder="Tên sản phẩm" required="" maxlength="100">
            </div>
        </div>
        <div class="form-group">
            <label for="price" class="col-sm-3 control-label required">Giá</label>
            <div class="col-sm-9">
                <input name="price" type="text" @if(isset($product)) value="{{ $product->price }}" @endif
                       class="form-control" id="price" placeholder="Giá sản phẩm (đơn vị: VNĐ)" maxlength="255">
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="col-sm-3 control-label">Mô tả</label>
            <div class="col-sm-9">
                <textarea name="description" rows="5" class="form-control finder" placeholder="Mô tả cho sản phẩm">@if(isset($product)) {!! $product->description !!} @endif</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="content" class="col-sm-3 control-label">Nội dung</label>
            <div class="col-sm-9">
                <textarea name="content" rows="5" class="form-control finder " placeholder="Mô tả cho sản phẩm">@if(isset($product)) {!! $product->content !!} @endif</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Ảnh đại diện</label>
            <div class=" col-md-9">
                <input name="image" class="form-control" id="thumbnail" @if(isset($product)) value="{{$product->image}}"
                       @endif/>
            </div>
            <div class="col-md-3"></div>
            <div class=" col-md-9">
                <input type="button" value="Browse Server" onclick="BrowseServer();"
                       style="margin-top: 15px; margin-bottom: 15px;"/>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <img id="blah" style=" width: 150px;" @if(isset($product)) src="{{ asset($product->image) }}" @else
                     src="" @endif alt=""/>
            </div>

        </div>

        <div class="form-group">
            <label class="control-label col-md-3">Trạng thái</label>
            <div class="col-md-9">
                <select class="form-control" name="statuses">
                    <option value="1" @if(isset($product)) @if($product->status==1) selected @endif @endif>ON</option>
                    <option value="2" @if(isset($product)) @if($product->status!=1) selected @endif @endif>OFF</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-submit">
                    <small><i class="fa fa-plus"></i></small>
                    @if(isset($product)) Sửa @else Thêm @endif
                </button>
                <a class="btn btn-warning" href="/admin/product/list">
                    <small><i class="fa fa-reply"></i></small>
                    Trở về</a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminlte/plugins/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">

    $(document).ready(function () {
        var editor = CKEDITOR.replace('content');
        CKFinder.setupCKEditor(editor, '../');

        var editor1 = CKEDITOR.replace('description');
        CKFinder.setupCKEditor(editor1, '../');


    });

    function BrowseServer() {
        CKFinder.popup({
            chooseFiles: true,
            onInit: function (finder) {
                finder.on('files:choose', function (evt) {
                    var file = evt.data.files.first();
                    $('#blah').attr('src', file.getUrl());
                    document.getElementById('thumbnail').value = file.getUrl();
                });
                finder.on('file:choose:resizedImage', function (evt) {
                    // $('#blah').attr('src', evt.data.resizedUrl);
                    //document.getElementById( 'thumbnail' ).value = evt.data.resizedUrl;
                });
            }
        });

    }

</script>
@endsection

