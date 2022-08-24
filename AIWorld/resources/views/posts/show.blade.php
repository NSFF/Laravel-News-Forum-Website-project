@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    {{ $post->title }}
                </a>
            </h1>
        </div>
    </div>

    @if(Auth::user())    
        <div class="mx-4">
            <a href="posts/create" class="fst-italic">
                Create Post &rarr;
            </a>
        </div>
        @else
            <div class="mx-4">
                <a href="login" class="fst-italic">
                    Login to Create a Post &rarr;
                </a>
            </div>
    @endif

    <div class="mx-4">
        <div class="text-start">            
            <div class="float-end">
                @if (isset(Auth::user()->id) && (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1))                        
                    <a href="edit" class="fst-italic">
                        Edit &rarr;
                    </a>
                    <form action="/posts/{{ $post->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-end p-0 btn btn-link">
                            Delete &rarr;
                        </button>
                    </form>
                @endif
            </div>
            <h2 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    {{ $post->title }}
                </a>
            </h2>
            
            <a href="/users/{{ $post->user_id }}/{{ $post->users->name }}" class="fst-italic">
                {{ $post->users->name }}
            </a>

            <span class="fst-italic">
                {{ $post->updated_at }}
            </span>

            <p class="my-1">
                {{ $post->content }}
            </p>
            <hr class="my-2">
            <h3>
                Comments
            </h3>
            @if(Auth::user())    
                <div class="mx-0">
                    <a href="{{ route('comments.post.create', $post->id) }}" class="fst-italic btn btn-primary py-1 my-2">
                        Create comment &rarr;
                    </a>
                </div>
            @else
                <div class="mx-0">
                    <a href="{{ route('login') }}" class="fst-italic">
                        Login to Create a comment &rarr;
                    </a>
                </div>
            @endif
            @foreach($comments as $comment)
                <div class="float-end">
                    @if (isset(Auth::user()->id) && (Auth::user()->id == $comment->users->id || Auth::user()->role_id == 1))                        
                        <a href="{{ route('comments.edit', $comment->id) }}" class="fst-italic">
                            Edit &rarr;
                        </a>
                        <form action="/comments/{{ $comment->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="float-end p-0 btn btn-link">
                                Delete &rarr;
                            </button>
                        </form>
                    @endif
                </div>
                <a href="/users/{{ $comment->users->id }}/{{ $comment->users->name }}" class="fst-italic">
                    {{ $comment->users->name }}
                </a>
                <span class="px-1">
                    {{ $comment->updated_at }}
                </span>
                <p class="my-1">
                    {{ $comment->content }}
                </p>
                <hr class="my-2">
            @endforeach
        </div>
    </div>
@endsection