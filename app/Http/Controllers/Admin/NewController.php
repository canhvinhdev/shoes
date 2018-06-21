<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use Auth;
use Session;
use App\Models\Category;

class NewController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
	public function index()
    {
        $new = News::listNew();
        return view('admin.new.list', compact('new'));
    }

    public function add()
    {
        return view('admin.new.edit');
    }

    public function store(Request $request)
    {
        if($request->has('id') && $request->id!= "") {
            $new = News::find($request->id);
             Session::flash('message_table', 'Sửa bảng thành công !');
        } else {
            $new = new News();
             Session::flash('message_table', 'Thêm bảng thành công !');
        }
        $new->status = $request->statuses;
        $new->name = $request->name;
        $new->content = $request->content;
        $new->image = $request->image;
        $new->description = $request->description;
        $user = Auth::user();
        $new->user_id = $user->id;
        $new->save();

        return redirect()->route('admin.new.list');
    }

    public function edit($id)
    {
        $new = News::find($id);
        return view('admin.new.edit', compact('new'));
    }
    
    public function delete($id)
    {
        try{
            $new = News::find($id);
            $new->delete();
            
        }catch(\Exception $e){
            Session::flash('message', 'Phải xóa các bảng chứa khóa ngoại trước !');
            return redirect()->route('admin.new.list');
        }
        Session::flash('message_table', 'Xóa bảng thành công !');
        return redirect()->route('admin.new.list');
    }
}
