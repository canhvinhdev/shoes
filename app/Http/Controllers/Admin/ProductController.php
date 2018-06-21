<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\News;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Slide;
use Auth;
use Session;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $product = Product::where('status', '=', 1)->get();
        return view('admin.product.list', compact('product'));
    }
    
    public function add()
    {
        $categories = Category::where('status', '=', 1)->get();
        return view('admin.product.edit', compact('categories'));
    }
    
    public function store(Request $request)
    {
        if($request->has('id') && $request->id != "") {
            $product= Product::find($request->id);
             Session::flash('message_table', 'Sửa bảng thành công !');
        } else {
            $product = new Product();
             Session::flash('message_table', 'Thêm bảng thành công !');
        }

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->content = $request->content;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->status = $request->statuses;
        $user = Auth::user();
        $product->user_id = $user->id;
        $product->save();
        
        return redirect()->route('admin.product.list');
    }
    
    public function edit($id)
    {
        $promotion = Promotion::where('status', '=', 1)->get();
        $categories = Category::where('status', '=', 1)->get();
        $product = Product::find($id);
        
        return view('admin.product.edit', compact('product','categories', 'promotion'));
    }
    
    public function delete($id)
    {
        try{
            $city = Product::find($id);
            $city->delete();
           
        }catch(\Exception $e){
            Session::flash('message', 'Phải xóa các bảng chứa khóa ngoại trước !');
            return redirect()->route('admin.product.list');
        }
        Session::flash('message_table', 'Xóa bảng thành công !');
        return redirect()->route('admin.product.list');
    }

    public function home()
    {
        return view('admin.home');
    }
}
