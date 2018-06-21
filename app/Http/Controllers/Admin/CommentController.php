<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comment = Comment::listComment();
        $total =  Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->join('products', 'products.id', '=', 'comments.product_id')
            ->where('comments.status','<>','1')
            ->where('users.status','=','1')
            ->where('products.status','=','1')
            ->count();
        return view('admin.comment.list', compact('comment','total'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $comment = new Comment();
        $data = Comment::find($request->id);
        $comment->sub_id = $request->id;
        $comment->product_id = $data->product_id;
        $comment->user_id = $user->id;
        $comment->status = 1;
        $comment->content = $request->content;
        $comment->save();
        Session::flash('message_table', ' Thêm bảng thành công !');
        return redirect()->route('admin.comment.list');
    }

    public function edit($id)
    {
        $comment = Comment::find($id);
        $product = Product::find($comment->product_id);
        $user = User::find($comment->user_id);
        return view('admin.comment.edit', compact('comment', 'product','user'));
    }

    public function delete($id)
    {
        try {
            $comment = Comment::find($id);
            $comment->delete();
        }catch(\Exception $e){
            Session::flash('message', 'Phải xóa các bảng chứa khóa ngoại trước !');
            return redirect()->route('admin.county.list');
        }
        Session::flash('message_table', ' Xóa bảng thành công !');
        return redirect()->route('admin.comment.list');
    }

}
