<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNewsRequest;
use App\Models\News\Category;
use App\Models\News\News;
use Illuminate\Http\Request;
use Str;

class NewsController extends Controller
{
    
    public function index()
    {
        $role = auth()->user()->role;
        if($role == 'admin') {
            $newsData = News::all();
        }
        else{
            $newsData = News::where('user_id','=',auth()->user()->id)->get();
        }
        return view($this->pagePath. 'news.index', compact('newsData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view($this->pagePath. 'news.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateNewsRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = md5(microtime()) . '.' . $ext;
            $uploadPath = public_path('uploads/news/');
            if ( $file->move($uploadPath, $fileName)) {
                $data['image'] = "uploads/news/" . $fileName;
                
            } else {
                return redirect()->back()->with('error', 'Image upload failed');
            }
        }
        $data['user_id'] = auth()->user()->id;
        News::create($data);
        return redirect()->route('manage-news.index')->with('success','news created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
