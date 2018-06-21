<?php
namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use View;
use DB;
use Input;
use Session;
use Response;
use Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      


       $order =   DB::table('users')
    ->join('orders', function ($join) {
        $join->on('users.id', '=', 'orders.user_id')
             ->where('orders.status_del','=',1);
    })
    ->get();


        return view('admin.order.list', compact('order'));
    }

    public function bill($id)
    {
      


      $order = Order::find($id);
        
  

     $product =   DB::table('products')
    ->join('order_details', function ($join) use($id) {
        $join->on('products.id', '=', 'order_details.product_id')
             ->where('order_details.order_id','=',$id);
    })
    ->get();

  $user = User::find( $order->user_id);

  

        return view('admin.order.bill', compact('order','product', 'user'));

    }

    public function store(Request $request)
    {
        if($request->has('id') && $request->id != "") {
            $order = Order::find($request->id);
             Session::flash('message_table', 'Sửa bảng thành công !');
        }
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.order.list');
    }

    public function edit($id)
    {


        $order = Order::find($id);
        


     $product =   DB::table('products')
    ->join('order_details', function ($join) use($id) {
        $join->on('products.id', '=', 'order_details.product_id')
             ->where('order_details.order_id','=',$id);
    })
    ->get();

$id = $id;

        $user = User::find( $order->user_id);
        return view('admin.order.edit', compact('order','product','user', 'id' ));
    }

    public function customer($id)
    {
        $order = Order::where('user_id','=',$id)->get();
        $user = User::find($id);
        return view('admin.order.customer', compact('order','user'));
    }

    public function delete($id)
    {
       




// $order_ = Order::find($id);
// $order_->products()->detach($product_id);


            $order = Order::find($id);
     
               $order->status_del = 0;
        $order->save();


       
        Session::flash('message_table', 'Xóa bảng thành công !');
        return redirect()->route('admin.order.list');
    }
}
