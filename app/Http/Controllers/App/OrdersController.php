<?php

namespace App\Http\Controllers\App;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Support\MessageBag;
use Session;
use Cart;
use Auth;
class OrdersController extends Controller
{
    public function checkOut(){
        $category = Category::where('status','=',1)->get();
        $content= Cart::content();
           $total = Cart::subtotal();
        //    echo '<pre>';
        //    print_r($content);die();
        //    echo '</pre>';
        return view('app.check-out', compact('content','total','category'));
    }
    public function postCheckOut(Request $request){

        $cart = Session::get('cart');

        $content= Cart::content()->toArray();
        $total  = Cart::subtotal();

        
 $total = (float)str_replace(',','',$total);




      
        $email = User::where('email','=',$request->email)->first();
        $users = Auth::user();
        $user = User::find($users->id);
        $user->fill($request->all());
       // $user->password = bcrypt($user->password);
        $user->save();
       
      
        $order = new Order();
        $order->user_id = $users->id;
        $order->price_all = $total;
        $order->method =  $request->method;
        $order->status = 0;
        $order->status_del = 1;
        $order->save();



     
        foreach ($content as $data){
            $orderDetail=new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $data['id'];
            $orderDetail->quantity = $data['qty'];
            $orderDetail->price = $data['price'];
          
            $orderDetail->save();
        }     
        Cart::destroy();
        return view('app.check-out-success');
        // return redirect()->route('customer', ['id' =>  $users->id]);
    }

    public function customer(){
        $users = Auth::user();
        //$users = User::find($users->id);
        $order = Order::where('user_id','=',$users->id)->get();
        var_dump($order);
        return view('app.customer', compact('users','order'));
    }
    public function editCustomer(){
        $users = Auth::user();
        return view('app.edit-customer', compact('users'));
    }
    public function storeCustomer(Request $request)
    {
        $user = Auth::user();
        if(isset($user)){
            if($user->password != $request->password){
                $request->password = bcrypt($user->password);
            }
        }
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->name = $request->name;
        $user->role_id = 2;
        $user->status = 1;
        $user->save(); 
        return redirect()->route('index');
    }


}

