@extends('layout.admin')

@section('title')
Quản lý bài viết
@endsection

@section('css')
<style>
    em {
        color: red;
    }
    textarea {
        resize: vertical; /* user can resize vertically, but width is fixed */
    }
</style>
@endsection

@section('controller')
Thêm mới tin tức
@endsection

@section('action')

@endsection

@section('content')

    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="post.html">Bài viết</a></li>
        <li class="active"><a href="new-post.html">Thêm bài viết mới</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="post-form" class="form-horizontal col-xl-9 col-lg-10 col-md-12 col-sm-12" method="post" action="{{ route('admin.new.store') }}" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
            <input name="id" type="hidden"  @if(isset($new)) value="{{ $new->id }}" @endif >
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label required">Tiêu đề</label>
                <div class="col-sm-10">
                    <input name="name" type="text" @if(isset($new)) value="{{ $new->name }}" @endif class="form-control" id="title" placeholder="Tên bài viết ( ~ 70 ký tự )" required="" maxlength="100">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Mô tả</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" placeholder="meta description ( ~ 160 ký tự )" maxlength="255">@if(isset($new)) {!! $new->description !!} @endif</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="content" class="col-sm-2 control-label">Nội dung</label>
                <div class="col-sm-10">
                    <textarea name="content" rows="5" class="form-control"  placeholder="Nội dung bài viết" ><@if(isset($new)) {!! $new->content !!} @endif</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-2">Ảnh đại diện</label>
                <div class="col-md-10">
                    <input name="image" class="form-control" id="thumbnail"  @if(isset($new)) value="{{$new->image}}" @endif  />
                </div>


                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="button" value="Browse Server" onclick="BrowseServer();" style="margin-top: 15px; margin-bottom: 15px;"/>
                </div>
                <div class="col-md-2"></div>
                <div class=" col-md-10">
                    <img id="blah" style=" width: 150px;"  @if(isset($new)) src="{{ $new->image }}" @else src="" @endif  alt=""  />
                </div>

            </div>
            <div class="form-group">
                <label class="control-label col-md-2">Trạng thái</label>
                <div class="col-md-10">
                    <select class="form-control" name="statuses">
                        <option value="1"  @if(isset($new)) @if($new->status==1) selected @endif @endif>ON</option>
                        <option value="2" @if(isset($new)) @if($new->status!=1) selected @endif @endif>OFF</option>
                    </select>
                </div>
            </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small>  @if(isset($new)) Sửa @else Thêm @endif</button>

                    <a class="btn btn-warning" href="/admin/new/list"><small><i class="fa fa-reply"></i></small> Trở về</a>
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
            var editor = CKEDITOR.replace( 'content');
            CKFinder.setupCKEditor( editor, '../' );

            var editor1 = CKEDITOR.replace( 'description');
            CKFinder.setupCKEditor( editor1, '../' );

           
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
            function SetFileField( fileUrl )
            {
                document.getElementById( 'thumbnail' ).value = fileUrl;
                $('#blah').attr('src', fileUrl);
            }
        
    </script>
@endsection

