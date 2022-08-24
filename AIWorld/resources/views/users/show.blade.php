@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    {{ $user->name }}
                </a>
            </h1>
        </div>
    </div>

    <div class="mx-4 text-start">
        <a href="{{ route('users.edit', $user->id) }}" class="tst-italic">
            Edit Profile 
        </a>
    </div>

    <img src="{{ asset('images/'.$user->image_path) }}" class="rounded mx-auto d-block" alt="" width="25%" height="200vh">
    
    <div class="mx-4">
        <p class="fw-bold">
            Birthday: <span class="fw-normal">{{ $user->birthday }}</span>
        </p>
        <p class="fw-bold">
            About me:
        </p>
        <p>
            {{ $user->about_me }}
        </p>
        <h2 class="fw-bold text-center">
            Posts
        </h2>
    </div>
    @foreach($user->posts as $post)
        <div class="mx-4">
            <div class="text-start">
                <div class="float-end">
                    @if (isset(Auth::user()->id) && (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1))                        
                        <a href="../../posts/{{ $post->id }}/edit" class="fst-italic">
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
                    <a class="nav-link px-0 py-0" href="/posts/{{ $post->id }}/{{ $post->title }}">
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
            </div>
        </div>
    @endforeach
    <h2 class="fw-bold text-center">
            Comments
    </h2>
    @foreach($user->comments as $comment)
        <div class="mx-4">
            <div class="text-start">
                <div class="float-end">
                    @if (isset(Auth::user()->id) && (Auth::user()->id == $comment->user_id || Auth::user()->role_id == 1))                        
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
                <h2 class="fw-bold">
                    <a class="nav-link px-0 py-0" href="/posts/{{ $comment->posts->id }}/{{ $comment->posts->title }}">
                        {{ $comment->posts->title }}
                    </a>
                </h2>

                <span class="fst-italic">
                    {{ $comment->updated_at }}
                </span>

                <p class="my-1">
                    {{ $comment->content }}
                </p>
                <hr class="my-2">
            </div>
        </div>
    @endforeach
@endsection