



@extends('layout.admin')

@section('title')
Quản lý danh mục
@endsection

@section('css')

@endsection


@section('content')

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





<script type="text/javascript" language="javascript" src="modules/ckeditor/ckeditor.js" ></script>
<!-- Topbar -->

<!-- /Topbar -->
<div class="panel-heading">


<div class="panel-title col-md-12">Thêm sản phẩm cho chương trình khuyến mãi <h3></h3></div>

<!-- <button type="button" class="btn btn-info right"><a href="?page=order&type=add">Tạo hóa đơn</a></button> -->
</div>



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

        <form id="post_form" method="post" action="" role="form">
            <div class="col-xs-12">
             
                <table id="product" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                        <th class="hidden-xs">ID</th>
                        <th>Sản phẩm</th>                   
                        <th class="hidden-sm hidden-xs">Giá</th>
                        <th>Khuyến mại</th>

                          <th>Giá áp dụng tại chương trình</th>
                        <th>Xóa</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($product) && count($product))
                        @php $stt = 1; @endphp
                        @foreach($product as $item)
                        <tr>
                            <td class="hidden-xs">{{ $stt }}</td>
                            <td>
                                <a href="/admin/product/edit/{{ $item->id }}">{{ $item->name }}</a>
                            </td>
                       
                            <td class="hidden-sm hidden-xs ">
                              
                            {{ number_format( $item->price,0,",",".") }} đ
                          
                          
                          </td>
                            <td class="text-center">

                          @if($item->number_discount > 0 )
                            {{ $item->number_discount }} %
                            @else

                            0%
                            @endif

                            </td>


                            <td class="hidden-sm hidden-xs">
                              

                            
                              {{ number_format($item->price - $item->price*($item->number_discount/100) ,0,",",".") }} đ
                              
                              
                              </td>

                            <td>
                                <p id="xoakm" data-variant="{{  $item->id }}"><i class="fa fa-minus-circle" data-toggle="tooltip" data-placement="top" title="Xóa sản phẩm"></i></p>
                            </td>

                           
                        </tr>
                        @php $stt++; @endphp
                        @endforeach
                    @endif
                    </tbody>
                </table>

           
            </div>
        </form>
    </div>



@section('script')
    <script type="text/javascript">

        $(document).ready( function () {
            $('#product').DataTable();
        } );

    </script>
@endsection







<div class="panel-body">


<form method="post" enctype="multipart/form-data">

<table class="table table-hover">
 <thead>
  <tr class="active">
    <th></th>
    <th>Tất cả sản phẩm</th>


  </tr>
</thead>


<tbody>

  <tr>
    <td>Sản phẩm</td>
    <td>
    @if(isset($product_all))
    @foreach($product_all as $data)
           <div style="width: 50%;float: left;">
          <input type="checkbox" class="radio_height " name="sp[]" value="{{ $data->id }}"> 
         {{ $data->name }}         </div>
    @endforeach
    @endif
    {{ csrf_field() }}   
      </td>
    </tr>
  </tbody>
</table>
<div class="km_sp">
  <div class="sanphamchon"></div>
  <br>
  <div style="margin-left: 450px;">
    <div id="themkm" class="btn btn-success">Thêm khuyến mãi</div> 
  </div> 
</div>
</form>
</div>
<script src="assets/js/jquery/jquery-1.11.3.min.js"></script>
<script  type="text/javascript" charset="utf-8" async defer>
$(document).ready(function(){
  $('.radio_height').change(function(e) {
    var data ="" ;
    $('input[name="sp[]"]:checked').each(function() {
      data = data + this.value+",";    
      
    });
    console.log(data);
    $.ajax({
      url: "{{ route('admin.promotion.select') }}" ,
      type:'POST',
      data:{'id':data, '_token':$('input[name="_token"]').val()},
      success:function(data){
        $('.sanphamchon').html(data);

      }
    });
  });
  $('#themkm').click(function(e){
    if($('input[name="sp[]"]:checked').length > 0)
    {
      var data2=[];
      var item ;
      var id_km = {{$promotion->id}};
      $('input[name="listkm[]"]:checked').each(function() {
        var km_tien = $(this).parents('.kmsp_tien').find('#km_tien');
        var km_tien_new = km_tien.val();
        var id_dh = $(this).parents('.kmsp_tien').find('#id_dh');
        var id = id_dh.val();
        item =  {id_km:id_km,id:id,km_tien:km_tien_new};
              data2.push(item);
      });
      $.ajax({
        url:"{{ route('admin.promotion.save') }}",
        type:'POST',
        cache: false,
        data:{'data':data2, '_token':$('input[name="_token"]').val()},
        success: function(data){
          console.log(data);
          alert(data);

        }
          
        });
      setInterval(function(){  location.reload();}, 1000);
    }
    else
    {
      alert('Bạn chưa lựa chọn sảm phẩm !')
    }
});


  $(document).on('click', '#xoakm', function(e){
  var id = $(this).data("variant");
  var id_km = {{$promotion->id}};
  if(confirm("Bạn có chắc chắn muốn xóa sản phẩm đó đi ra khỏi chương trình khuyến mại đó không?"))
  {
  $.ajax({
    url:"{{ route('admin.promotion.delete_pro') }}",
        type:'POST',
        //dataType:'json',
        cache: false,
        data:{id:id , id_km:id_km ,'_token':$('input[name="_token"]').val()},
        success: function(data){
          $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
          alert(data);
        }
      });
  setInterval(function(){  location.reload();}, 1000);
  }
});
});
</script>






@endsection

@section('script')
  <script type="text/javascript">

      $(document).ready( function () {
          $('#type').DataTable();
      } );

  </script>
@endsection


