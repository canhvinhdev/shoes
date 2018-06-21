@extends('layout.app')
@section('title')
    Đăng nhập
@stop
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-top: 20px">
        <li>
            <a href="#">Home</a>
        </li>

        <li class="active">Đăng nhập</li>
    </ol>

</div>

<div class="container">

    <h1 class="text-center login-title">Đăng nhập</h1>
    <div class="account-wall">
        <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
             alt="">
        <form class="form-signin" action="{!! route('postLogin') !!}" method="post">
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
            <input name="password" type="password" class="form-control" min="5" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                ĐĂNG NHẬP</button>
           
          
        </form>
    </div>
    <a href="/dang-ky" class="text-center new-account">Tạo tài khoản </a>
</div>
@endsection