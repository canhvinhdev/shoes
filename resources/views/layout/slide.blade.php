<?php
use App\Models\Slide;
$slide = Slide::where('status','=',1)->get();
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 noeft">
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-id" data-slide-to="0" class=""></li>
          <li data-target="#carousel-id" data-slide-to="1" class=""></li>
          <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">


         @if(isset($slide))
         @foreach($slide as $data)
         @if($loop->first)
         <div class="item active">
          <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="{{$data->image}}" style=" text-align: center;  height: 300px; width: 960px; ">
          <div class="container">
            <div class="carousel-caption">

              <p>{{  $data->content }}</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p> -->
            </div>
          </div>
        </div>
        @else

        <div class="item ">
          <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="{{$data->image}}"style="text-align: center;height: 300px; width: 1150px;">
          <div class="container">
            <div class="carousel-caption">

              <p>{{  $data->content }}</p>
              <!-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Xem thêm</a></p> -->
            </div>
          </div>
        </div>

        @endif




        @endforeach


        @endif
      </div>
      <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>


    <div class="col-md-12 hidden-xs">
      <div class="special-box-col">
        <div class="col-md-3 col-sm-3 col-xs-6 text-center special-box">
          <div class="col-md-4">
            <span class="special-icon"><i class="fa fa-plane"></i></span>
          </div>
          <div class="col-md-8">
            <h5><a href="">Miễn phí vận chuyển</a></h5>
            <p></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center special-box">
          <div class="col-md-4">
            <span class="special-icon"><i class="fa fa-stack-overflow"></i></span>
          </div>
          <div class="col-md-8">
            <h5><a href="">Thanh toán tại chỗ</a></h5>
            <p></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center special-box">
          <div class="col-md-4">
            <span class="special-icon"><i class="fa fa-sellsy"></i></span>
          </div>
          <div class="col-md-8">
            <h5><a href="">Chính sách hậu mãi</a></h5>
            <p></p>
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 text-center special-box">
          <div class="col-md-4">
            <span class="special-icon"><i class="fa fa-whatsapp"></i></span>
          </div>
          <div class="col-md-8">
            <h5><a href="">Hỗ trợ 24/7 0123.456.7899</a></h5>
            <p></p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- End Carousel -->
</div>
<script type="text/javascript">

  $(document).ready( function() {
    $('#myCarousel').carousel({
      interval:   4000
    });

    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function() {
      clickEvent = true;
      $('.nav li').removeClass('active');
      $(this).parent().addClass('active');
    }).on('slid.bs.carousel', function(e) {
      if(!clickEvent) {
        var count = $('.nav').children().length -1;
        var current = $('.nav li.active');
        current.removeClass('active').next().addClass('active');
        var id = parseInt(current.data('slide-to'));
        if(count == id) {
          $('.nav li').first().addClass('active');
        }
      }
      clickEvent = false;
    });
  });
</script>