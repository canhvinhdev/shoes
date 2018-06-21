@extends('layout.admin')

@section('title')
Quản lý người dùng
@endsection

@section('css')
@endsection

@section('controller')
Thêm mới người dùng
@endsection

@section('action')

@endsection

@section('content')
    <ol class="breadcrumb">
        <li><a href="index.html"><i class="fa fa-home"></i> Trang quản trị</a></li>
        <li class="active"><a href="user.html">Tài khoản</a></li>
        <li class="active"><a href="new-user.html">Thêm tài khoản mới</a></li>
    </ol>
    <div class="col-xs-12">
        <form id="admin-form" class="form-horizontal col-xl-8 col-lg-9 col-md-10" action="{{ route('admin.user.store') }}" method="POST" role="form">
            {{ csrf_field() }}
            <input name="id" type="hidden" @if(isset($user)) value="{{ $user->id }}" @endif >
            <div class="form-group">
                <label for="fullname" class="col-sm-3 control-label required">Chức năng</label>
                <div class="col-sm-9">
                    <select class="form-control" name="role_id">
                        @if(isset($listRole) && count($listRole))
                            @foreach($listRole as $item)
                                <option value="{{ $item->id }}"
                                        @if(isset($user) && $user->user_id == $item->id)
                                        selected
                                        @endif
                                >{{ $item->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="fullname" class="col-sm-3 control-label required">Tên hiển thị</label>
                <div class="col-sm-9">
                    <input name="name" type="text"  @if(isset($user)) value="{{ $user->name }}" @endif class="form-control" id="fullname" placeholder="Tên hiển thị" required="" maxlength="255">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label required">Tên đăng nhập</label>
                <div class="col-sm-9">
                    <input name="username" type="text" @if(isset($user)) value="{{ $user->username }}" @endif class="form-control"  placeholder="Tên đăng nhập" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label required">Email</label>
                <div class="col-sm-9">
                    <input name="email" type="email" @if(isset($user)) value="{{ $user->email }}" @endif class="form-control" id="email" placeholder="Email" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="pass" class="col-sm-3 control-label required">Mật khẩu</label>
                <div class="col-sm-9">
                    <input name="password" type="password" @if(isset($user)) value="{{ $user->password }}" @endif class="form-control"  placeholder="Mật khẩu" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="repass" class="col-sm-3 control-label required">Địa chỉ</label>
                <div class="col-sm-9">
                    <input name="address" type="text" @if(isset($user)) value="{{ $user->address }}" @endif class="form-control" iplaceholder="Địa chỉ" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="pass" class="col-sm-3 control-label required">Số điện thoại</label>
                <div class="col-sm-9">
                    <input name="phone" type="text"  @if(isset($user)) value="{{ $user->phone }}" @endif class="form-control"  placeholder="Số điện thoại" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-3 control-label required">Ngày sinh</label>
                <div class="col-sm-9">
                    <input name="birtday" type="date" @if(isset($user)) value="{{ $user->birtday }}" @endif class="form-control"  placeholder="Ngày sinh" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="parent" class="col-sm-3 control-label">Loại sản phẩm gốc</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status">
                        <option value="1"@if(isset($user)) @if($user->status==1) selected @endif @endif>Hoạt động</option>
                        <option value="2"@if(isset($user)) @if($user->status!=1) selected @endif @endif>Khóa</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-submit"><small><i class="fa fa-plus"></i></small> @if(isset($user)) Sửa @else Thêm @endif</button>
                    <a class="btn btn-warning" href="#"><small><i class="fa fa-reply"></i></small> Trở về</a>
                </div>
            </div>
        </form>
    </div>

@endsection

