@extends('layout.app')
@section('title')
    Đăng ký
@stop
@section('content')
    <div class="container">
        <ol class="breadcrumb" style="margin-top: 20px">
            <li>
                <a href="#">Home</a>
            </li>

            <li class="active">Đăng ký</li>
        </ol>

    </div>

    <div class="container">

        <h1 class="text-center login-title">Đăng ký</h1>
        <div class="account-wall">
            <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                 alt="">
            <form class="form-signin" action="{!! route('postRegister') !!}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    @if($errors->has('errorlogin'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('errorlogin')}}
                        </div>
                    @endif
                </div>

                <input name="email" type="email" class="form-control" placeholder="Email" required autofocus>
                <input name="name" type="text" class="form-control" placeholder="Họ tên " required autofocus>
                <input name="username" type="text" class="form-control" max="25" placeholder="Tên " required autofocus>
                <input name="password" type="password" class="form-control" min="5" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Đăng ký</button>
                {{--<label class="checkbox pull-left">--}}
                    {{--<input type="checkbox" value="remember-me">--}}
                    {{--Nhớ mật khẩu--}}
                {{--</label>--}}
                {{--<a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>--}}
            </form>
        </div>
        <a href="dang-nhap" class="text-center new-account">Đăng nhập</a>
    </div>
@endsection