@extends('layout.admin')

@section('title')
Quản lý slide
@endsection

@section('css')
@endsection


@section('content')

    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="/admin/slide/list"><a href="slider.html">Slider</a></li>
        <li class="active"><a href="#">Thêm slider mới</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="admin-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('admin.slide.store') }}" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
            <input name="id" type="hidden" @if(isset($slide)) value="{{ $slide->id }}" @endif>
            <div class="form-group">
                <label for="content" class="col-sm-2 control-label required">Nội dung</label>
                <div class="col-sm-10">
                    <textarea name="contents" rows="5" class="form-control" placeholder="Nội dung cho hình ảnh ( ~ 120 ký tự )" >@if(isset($slide)) {{ $slide->content}} @endif </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Ảnh</label>
                <div class=" col-sm-10">
                    <input name="image" class="form-control" id="thumbnail"  @if(isset($slide)) value="{{ $slide->image}}" @endif  />
                </div>
                <div class="col-sm-2"></div>
                <div class= "col-sm-10">
                    <input type="button" value="Browse Server" onclick="BrowseServer();" style="margin-top: 15px; margin-bottom: 15px;"/>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <img id="blah" style=" width: 150px;"  @if(isset($slide)) src="{{asset($slide->image) }}" @endif  @if(isset($slide)) alt="{{ $slide->content}}" @endif   />
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Trạng thái<em></em></label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option value="1"  @if(isset($slide)) @if($slide->status==1) selected @endif @endif>ON</option>
                        <option value="2" @if(isset($slide)) @if($slide->status!=1) selected @endif @endif>OFF</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> @if(isset($slide)) Sửa @else Thêm @endif</button>
                    <a class="btn btn-warning" href="/admin/slide/list"><small><i class="fa fa-reply"></i></small> Trở về</a>
                </div>
            </div>
        </form>
    </div>
    @endsection
@section('script')
<script type="text/javascript" src="{{ asset('adminlte/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{ asset('adminlte/plugins/ckfinder/ckfinder.js')}}"></script>
<script>

</script>
<script type="text/javascript">

    $( document ).ready(function() {
        var editor = CKEDITOR.replace( 'contents');
        CKFinder.setupCKEditor( editor, '../' );
    });

    function BrowseServer()
    {
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    $('#blah').attr('src', file.getUrl());
                    document.getElementById( 'thumbnail' ).value = file.getUrl();
                } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    // $('#blah').attr('src', evt.data.resizedUrl);
                    //document.getElementById( 'thumbnail' ).value = evt.data.resizedUrl;
                } );
            }
        } );

    }

</script>
@endsection

