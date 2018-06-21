@extends('layout.app')
@section('title')
    Thanh toán
@stop
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-top: 20px">
        <li>
            <a href="#">Home</a>
        </li>

        <li class="active">Thanh toán</li>
    </ol>

</div>
<?php  $user = Auth::user();?>
<div class="container">
   @if(isset($user))
    <form action="{!! route('postCheckOut') !!}" method="post" >
        {{ csrf_field() }}
        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 ">
            <!--SHIPPING METHOD-->


         
            <div class="panel panel-info">
                <div class="panel-heading">Address</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>Địa chỉ giao hàng</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        @if($errors->has('errorlogin'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{$errors->first('errorlogin')}}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Họ tên:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" @if(isset($user)) value="{!! $user->name !!}" @endif required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Địa chỉ:</strong></div>
                        <div class="col-md-12">
                            <input type="text" name="address" class="form-control" @if(isset($user)) value="{!! $user->address !!}" @endif required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12"><strong>Số điện thoại:</strong></div>
                        <div class="col-md-12"><input type="text" name="phone" max="12" class="form-control" @if(isset($user)) value="{!! $user->phone !!}" @endif required/></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Email:</strong></div>
                        <div class="col-md-12"><input type="email" name="email" class="form-control" @if(isset($user)) value="{!! $user->email !!}" @endif required  readonly="" /></div>
                    </div>

                    <!--
                    <div class="form-group">
                        <div class="col-md-12"><strong>Ngày sinh:</strong></div>
                        <div class="col-md-12"><input type="text" name="birtday" class="form-control" @if(isset($user)) value="{!! $user->birtday !!}" @endif required/></div>
                    </div>

                
                    <div class="form-group">
                        <div class="col-md-12"><strong>Tên đăng nhập:</strong></div>
                        <div class="col-md-12"><input type="text" name="username" max="25" class="form-control" @if(isset($user)) value="{!! $user->username !!}" @endif required/></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Mật khẩu:</strong></div>
                        <div class="col-md-12"><input type="password" name="password" class="form-control" @if(isset($user)) value="{!! $user->password !!}" @endif required/></div>
                    </div>

                -->
                    <input type="hidden" name="id" class="form-control" @if(isset($user)) value="{!! $user->id !!}" @endif required/>
                </div>
            </div>
            <!--SHIPPING METHOD END-->
            <!--CREDIT CART PAYMENT-->
            <div class="panel panel-info">
                <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Phương thức thanh toán</div>
                <div class="panel-body">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thanh toán trực tiếp


                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                <input type="radio" name="method" value="0" checked>

                               - Thanh toán trực tiếp tại cửa hàng
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Thanh toán chuyển khoản qua ngân hàng
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">

                                       <input type="radio" name="method" value="1" >
                                    - Thanh toán bằng hình thức chuyển khoàn.
                                    Vui lòng chuyển khoản vào stk : 11233445 VPBank . Chi nhánh Đống Đa.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <!--CREDIT CART PAYMENT END-->
        </div>
        <div class="col-sm-12 col-md-7 ">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Số lượng </th>
                <th class="text-center">Giá</th>
                <th class="text-center">Tổng</th>

            </tr>
            </thead>
            <tbody>
            <tbody>
            @if(isset($content))
                @foreach($content as $item)
                <?php $item = get_object_vars($item);?>
                <tr>
                    <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="/product/{{$item['id']}}-{{str_slug($item['name'])}}"> <img class="media-object" src="{!! asset($item['options']['image']) !!}" style="width: 32px; height: 32px;"> </a>
                            <div class="media-body">
                                <p class="media-heading" style="padding-left: 20px;"><a href="/product/{{$item['id']}}-{{str_slug($item['name'])}}">{!! $item['name'] !!}</a></p>

                            </div>
                        </div></td>
                    <td class="col-sm-1 col-md-2" style="text-align: center">
                        <strong>{!! $item['qty'] !!}</strong>
                    </td>
                    <td class="col-sm-1 col-md-2 text-center"><strong>{!! number_format($item['price'],0,",",".") !!}</strong></td>
                    <td class="col-sm-1 col-md-2 text-center"><strong>{{ number_format($item['price']*$item['qty'],0,"",".")  }} đ</strong></td>

                </tr>
                @endforeach



                <tr>

                    <td>   </td>
                    <td>   </td>
                    <td><h5>Tổng tiền</h5></td>
                <td class="text-right"><h5><strong>{{ number_format(((float)str_replace(',','',$total)) ,0,"",".") }} đ</strong></h5></td>
                </tr>

                <tr>

                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="/"> <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua sắm
                        </button></a></td>
                    <td>
                        <a href="/khach-hang"><button type="submit" class="btn btn-success">
                            Thanh toán <span class="glyphicon glyphicon-play"></span>
                        </button></a></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    </form>
       @else
<div class="text-center">
            <a href="/dang-nhap">Vui lòng thực hiện đăng nhặp để thực hiện tiếp thanh toán</a>
            <br>
  <br>
        </div>
            @endif

</div>
@endsection