<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNewsRequest;

class NewsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->except('index', 'show', 'news');
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //SELECT * FROM NEWS ordered by date it was created
        $news = News::orderBy('updated_at', 'DESC')->get();
        return view('news.news', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateNewsRequest $request)
    {
        $request->validated();

        $newImageName = time().'-'.$request->file('image')->getClientOriginalName();

        $path = $request->image->move(public_path('images'), $newImageName);
        
        News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
            'image_path' => $newImageName,
        ]);

        return redirect('/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateNewsRequest $request, News $news)
    {
        $request->validated();

        if(! is_null($request->file('image'))){
            $newImageName = time().'-'.$request->file('image')->getClientOriginalName();
            $path = $request->image->move(public_path('images'), $newImageName);
            
            $news->update([
                'image_path' => $newImageName,
            ]);

        }
        else{
            $news->update([
                'image_path' => $news->image_path,
            ]);
        }

        $news->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect('/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect('/news');
    }
}
