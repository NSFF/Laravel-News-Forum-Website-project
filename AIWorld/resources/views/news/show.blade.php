@extends('layouts.app')

@section('content')
    @if(file_exists(public_path().'/'.'images/'.$news->image_path))
        <img src="{{ asset('images/'.$news->image_path) }}" class="rounded mx-auto d-block" alt="" width="70%" height="300vh">
    @else
        <img src="{{ $news->image_path }}" class="rounded mx-auto d-block" alt="" width="70%" height="300vh">
    @endif
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    {{ $news->title }}
                </a>
            </h1>
        </div>
    </div>

    @if(Auth::user())    
        <div class="mx-4">
            <a href="../create" class="fst-italic">
                Create News Post &rarr;
            </a>
        </div>
    @endif

    <div class="mx-4">
        <div class="text-start">            
            <div class="float-end">
                @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1))                        
                    <a href="edit" class="fst-italic">
                        Edit &rarr;
                    </a>
                    <form action="/news/{{ $news->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-end p-0 btn btn-link">
                            Delete &rarr;
                        </button>
                    </form>
                @endif
            </div>

            <span class="fst-italic">
                {{ $news->updated_at }}
            </span>

            <p class="my-1">
                {{ $news->content }}
            </p>
            <hr class="my-2">
        </div>
    </div>
@endsection