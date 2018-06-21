<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\News;
use App\Models\Slide;
use App\Models\Tour;
use App\Models\Product;
use App\Models\User;
use  DB;
class NewController extends Controller
{
	public function getlistnew(){
		$news = News::where('status',1)->orderBy('id','DESC')->paginate(7);
		$news_count = News::where('status',1)->count();


		return view('layout.modules.news.listnews',compact('news','news_count', 'user_created'));
	}


	public function detailnews($id){
		$news_detail = News::find($id);
		return view('layout.modules.news.detailnews',compact('news_detail'));
	}
}

