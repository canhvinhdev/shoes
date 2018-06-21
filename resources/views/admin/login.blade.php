<!DOCTYPE html>
<html lang="vi"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập hệ thống</title>
    <link rel="shortcut icon" href="favicon.png">
    <link href="{{ asset('adminlte/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminlte/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
        body {
               background: #424242;
        }
        #loginForm {
            width: 300px;
            min-height:200px;
            padding: 20px;
            margin: 120px auto 0;
            background:#fff;
            border-radius: 7px;
        }
    </style>
</head>



<div id="loginForm">

    <form action="{{ route('login') }}" method="post" class="form-signin" role="form">
        <div class="form-group" style="text-align: center"><h4>ĐĂNG NHẬP HỆ THỐNG</h4></div>
        {{ csrf_field() }}

<div class="col-md-12 text-center clearfix">

        <img src="/adminlte/images/admin_login.jpg">
</div>

        <div class="form-group">
            @if($errors->has('errorlogin'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{$errors->first('errorlogin')}}
                </div>
            @endif
        </div>
        @if($errors->has('email'))
            <p style="color:red">{{$errors->first('email')}}</p>
        @endif
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input name="email" type="email"  class="form-control" id="email" placeholder="Email" maxlength="100" required="">
            </div>
        </div>
        @if($errors->has('password'))
            <p style="color:red">{{$errors->first('password')}}</p>
        @endif
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input name="password" type="password" class="form-control" id="password" placeholder="Mật khẩu" required="">
            </div>
        </div>
        <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">Đăng nhập</button>
      
        </div>
    </form>
</div>

</body>
</html>
