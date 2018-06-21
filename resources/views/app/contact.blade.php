@extends('layout.app')
@section('title')
Liên hệ
@stop
@section('content')
<div class="container">
    <ol class="breadcrumb" style="margin-top: 20px">
        <li>
            <a href="#">Home</a>
        </li>

        <li class="active">Liên hệ</li>
    </ol>

</div>

<div class="container">
    <div class="col-sm-12 col-md-12 ">




     <div class="page-contact-wrapper">
        <div class="page-head">
            <h1>Liên hệ</h1>
        </div>
        <div class="page-body">
            <div class="grid">
                <div class="grid__item large--one-half medium--one-half small--one-whole">
                    <div class="rte contact-desc">
                        <p>Khi nhắc tới những shop dụng cụ thể thao có hoạt động kinh doanh sôi nổi và được nhiều người biết tới trên địa bàn Hà Nội, chúng ta cần phải kể tới Shop bán giày online - một trong những đơn vị chuyên sản xuất, nhập khẩu và phân phối giày cao cấp thể thao uy tín tại thủ đô. Shop cung cấp đa dạng các thiết bị thể thao từ các thiết bị phòng tập đến thiết bị thể thao tại nhà, thiết bị phục hồi chức năng… với các dòng sản phẩm chính như: máy chạy bộ, xe đạp tập, giàn tạ... Tất cả đều là những thiết bị chính hãng với mức giá phải chăng và phù hợp với đại đa số người Việt.</p>
                    </div>



                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Địa chỉ trụ sở:</h3>
                        </div>
                        <div class="panel-body">
                           175 Tây Sơn Đống Đa Hà Nội
                        </div>
                    </div>


                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Địa chỉ trụ sở:</h3>
                        </div>
                        <div class="panel-body">
                           175 Tây Sơn Đống Đa Hà Nội
                        </div>
                    </div>




                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Số điện thoại:</h3>
                        </div>
                        <div class="panel-body">
                        0999 999 999
                        </div>
                    </div>
                 <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"> Email:</h3>
                        </div>
                        <div class="panel-body">
                    support@support.vn
                        </div>
                    </div>





                </div>
              
             
            </div>
        </div>

        <div class="col-md-7 col-sm-12 col-xs-12 contactFormWrapper" id="col-left ">
				<h3>Viết nhận xét</h3>
				<hr class="line-left">
				<p>
					Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với bạn sớm nhất có thể .
				</p>
				<form accept-charset="UTF-8" action="/luu-lien-he" class="contact-form" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label  class="sr-only">Tên</label>
                        <input  type="text"  class="form-control input-lg" name="name" placeholder="Tên của bạn" autocapitalize="words"  required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Email</label>
                        <input type="email" name="email" placeholder="Email của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" required>
                    </div>
                    

                        <div class="form-group">
                        <label  class="sr-only">Phone</label>
                        <input  type="text" name="phone" placeholder="Số điện thoại của bạn" id="contactFormEmail" class="form-control input-lg" autocorrect="off" autocapitalize="off" required>
                    </div>
                    <div class="form-group">
                        <label for="contactFormMessage" class="sr-only">Nội dung</label>
                        <textarea required="" rows="6" name="content" class="form-control" placeholder="Viết bình luận" id="contactFormMessage"></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary btn-lg btn-rb" value="Gửi liên hệ">
				</form>

            </div>

            <div class="col-md-5 sm-12 col-xs-12 " id="col-right">
				<h3>Chúng tôi ở đây</h3>
				<hr class="line-right">
				<h3 class="name-company">Fashion Style</h3>
				<p>	Giải pháp bán hàng toàn diện từ website đến cửa hàng	</p>
				<ul class="info-address">
					<li>
						<i class="glyphicon glyphicon-map-marker"></i>
						<span>175 Tây Sơn, Quận Đống Đa, Thành Phố Hà Nội</span>
					</li>
					<li>
						<i class="glyphicon glyphicon-envelope"></i>
						<span>quyennt@gmail.com</span>
					</li>

					<li>
						<i class="glyphicon glyphicon-phone-alt"></i> 
						<span>1900.636.099</span>
					</li>

				</ul>

			</div>
            


    </div>
</div>
</div>
</div>
</div>

@endsection