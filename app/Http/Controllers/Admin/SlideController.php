<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slide;
use Session;
use DB;

class SlideController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.list', compact('slide'));
    }
    
    public function add()
    {
        return view('admin.slide.edit');
    }
    
    public function store(Request $request)
    {
        if($request->has('id') && $request->id != "") {
            $slide = Slide::find($request->id);
            Session::flash('message_table', 'Sửa bảng thành công !');
        } else {
            $slide = new Slide();
             Session::flash('message_table', 'Thêm bảng thành công !');
        }
        $slide->image = $request->image;
        $slide->status = $request->status;
        $slide->content = $request->contents;
        $slide->save();
        return redirect()->route('admin.slide.list');
    }
    
    public function edit($id)
    {
        $slide = Slide::find($id);
        
        return view('admin.slide.edit', compact('slide'));
    }
    
    public function delete($id)
    {
        try{
            $slide = Slide::find($id);
            $slide->delete();
            
        }catch(\Exception $e){
            Session::flash('message', 'Phải xóa các bảng chứa khóa ngoại trước !');
            return redirect()->route('admin.order.list');
        }
        Session::flash('message_table', 'Xóa bảng thành công !');
        return redirect()->route('admin.slide.list');
    }
}
