@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    Posts
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
            @foreach ($posts as $post)
                <div class="float-end">
                    @if (isset(Auth::user()->id) && (Auth::user()->id == $post->user_id || Auth::user()->role_id == 1))                        
                        <a href="posts/{{ $post->id }}/edit" class="fst-italic">
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
                <hr class="my-2">
            @endforeach
        </div>
    </div>
@endsection