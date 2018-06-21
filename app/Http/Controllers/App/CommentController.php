<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Redirect;

class CommentController extends Controller
{
    public function comment(Request $request){

        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->product_id = $request->product_id;
        $comment->content = $request->content;
        $comment->status = 2;
        $comment->sub_id = 0;
        $comment->save();
        $product = Product::find($request->product_id);
        return Redirect::to('/product/'.$product->id.'-'.str_slug($product->name));
    }
}
