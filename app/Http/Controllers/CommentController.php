<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('comments.create', ['postId' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $request->validate([
            'content' => 'required|max:10000',
        ]);
        
        
        $post = Post::find($id);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
            'post_id' => $id,
        ]);

        return redirect('/posts'.'/'.$id.'/'.$post->name);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|max:10000',
        ]);
        
        $comment = Comment::find($id);
        $comment->update([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect('/posts'.'/'.$comment->posts->id.'/'.$comment->posts->name);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        $postName = $comment->posts->name;
        $postId = $comment->posts->id;
        return redirect('/posts'.'/'.$postId.'/'.$postName);
    }
}
