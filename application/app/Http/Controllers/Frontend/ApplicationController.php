<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use DB;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if($search){
            $newsData= DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name')
            ->where('news.title', 'like', '%' . $search . '%')
            ->orWhere('categories.name', 'like', '%' . $search . '%')
            ->get();
        }else{
            $newsData = News::orderBy('id','desc')->get();
        }
        return view('pages.frontend.pages.home.home',compact('newsData'));
    }

    public function newsDetails($slug){

        $News = News::where('slug' , '=', $slug )->first();
        $catID = $News->category->id;
        $News->pagevisit+=1;
        $News->save();
        $relatednews = News::where('category_id', $catID)->where('id', '!=', $News->id)->get();
        return view('pages.frontend.pages.inside.news',compact('News','relatednews'));
    }
}
