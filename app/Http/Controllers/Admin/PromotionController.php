<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\PromotionProduct;
use Auth;
use Session;

class PromotionController extends Controller{

    public function delete($id)
    {
        try{
            $promotion = Promotion::find($id);
            $promotion->delete();
           
        }catch(\Exception $e){
            Session::flash('message', 'Phải xóa các bảng chứa khóa ngoại trước !');
        }
        Session::flash('message_table', 'Xóa bảng thành công !');
        return redirect()->route('admin.promotion.list');
    }

    public function index()
    {
        $promotion = Promotion::where('status', '=', 1)->get();
        return view('admin.promotion.list', compact('promotion'));
    }

    public function add()
    {
        //$data = Promotion::where([['status', '=', 1],['parent_id','=',0]])->get();
        return view('admin.promotion.edit');
    }

    public function store(Request $request)
    {
        if($request->has('id') && $request->id != "") {
            $promotion = Promotion::find($request->id);
            Session::flash('message_table', 'Sửa mới thành công !');
        } else {
            $promotion = new Promotion();
            Session::flash('message_table', 'Thêm bảng thành công !');
        }

        $promotion->name = $request->name;
        $promotion->status = $request->statuses;
        $promotion->start_day = $request->start_day;
        $promotion->content = $request->content;
        $promotion->end_day = $request->end_day;
        $user = Auth::user();
        $promotion->user_id = $user->id;
        $promotion->save();

        return redirect()->route('admin.promotion.list');
    }

    public function edit($id)
    {
        $promotion = Promotion::find($id);

        return view('admin.promotion.edit', compact('promotion'));
    }


    public function config($id)
    {
        $promotion = Promotion::find($id);
       $product_all = Product::where('status', '=', 1)->get();
        $product = PromotionProduct::join('products','products.id','=','promotion_product.product_id')
        ->where('promotion_product.promotion_id','=',$id)
        
        ->get();
        return view('admin.promotion.config', compact('promotion', 'product' ,'product_all'));
    }


    public function select(Request $request)
    {
        $ids = $request->id;
        $ids =substr($ids, 0, -1);
        $arr= explode(",",$ids);
        echo '<div class="list_content">'
        .'<table class="table table-hover">'
        .'<h3 align="center">Danh sách sản phẩm chọn</h3>'
        .'<tr>'
        .	'<th>Tên sản phẩm</th>'
        .	'<th>Giá khuyến mại</th>'
        .'</tr>';

      
        foreach($arr as $item){

            
              
            $product = Product::find($item);
      if(isset($product) ){
                echo '<tr >'
                        .'<td>'. $product->name .'</td>'
                        .'<td class="kmsp_tien">'
                        .	'<input type="checkbox" checked="checked" class="col-md-1" name="listkm[]" value="'.$product->id.'" >'
                        .	'<input type="hidden" id="id_dh" value="'.$product->id.'">'
                        .	'<input   type="number" value="" class=" col-md-8"  placeholder="0%" required name="giam_gia" id="km_tien">'
                        .'</td>'		        

                    .'</tr>';
                
                
        }
    }
        echo '</table>'
            .'</div>';
        die();
    }
    public function delete_pro(Request $request)
    {
        $product_id=$request->id;
        $promotion_id =$request->id_km;
        $data = PromotionProduct::where('product_id','=',$product_id)->where('promotion_id','=',$promotion_id)->first();
        $data->delete();
        echo 'Sản phảm khuyến mại đã xóa thành công';

    }


    public function save(Request $request)
    {
        $i = 0;
        foreach($request->data as $item){
            $id_sp = $item['id'];
            $id_km =$item['id_km'];
            $km_tien =$item['km_tien']; 
            $result = 0;
            $a = 0;
            if($id_km>0){
                    $kmsql = Promotion::join('promotion_product', 'promotion_product.promotion_id', '=', 'promotion.id')
                    ->join('products','products.id','=','promotion_product.product_id')
                    ->where('promotion.end_day','>','Date')
                    ->where('products.id','=',$id_sp)
                    ->get();
                    if(count($kmsql)!=0){
                        $err = "Sản phẩm đang trong chương trình khuyến mãi mời chọn sản phẩm khác";  
                    } else{
                        $promotionProduct= new PromotionProduct();
                        $promotionProduct->product_id =$id_sp;
                        $promotionProduct->promotion_id =$id_km;
                        $promotionProduct->number_discount =$km_tien;
                        $promotionProduct->save();
                    }   
                   
            }
        }
        if (isset($err)) {
            echo $err;
        }
        else
        {
            echo 'Bạn đã thêm thành công khuyến mãi'; 
        }
    }
}

 ?>