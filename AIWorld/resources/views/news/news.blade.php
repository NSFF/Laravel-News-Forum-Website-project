@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    News
                </a>
            </h1>
        </div>
    </div>

    @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1))    
        <div class="mx-4">
            <a href="news/create" class="fst-italic">
                Create News Post &rarr;
            </a>
        </div>
    @endif

    <div class="mx-4">
        <div class="text-start">            
            @foreach ($news as $new)
            <div class="float-end">
                @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1))                        
                    <a href="news/{{ $new->id }}/edit" class="fst-italic">
                        Edit &rarr;
                    </a>
                    <form action="news/{{ $new->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-end p-0 btn btn-link">
                            Delete &rarr;
                        </button>
                    </form>
                @endif
            </div>
            <h2 class="fw-bold">
                <a class="nav-link px-0 py-0" href="news/{{ $new->id }}/{{ $new->title }}">
                    {{ $new->title }}
                </a>
            </h2>
            
            <span class="fst-italic">
                {{ $new->updated_at }}
            </span>
            
            @if(file_exists(public_path().'/'.'images/'.$new->image_path))
                <img src="{{ asset('images/'.$new->image_path) }}" class="rounded mx-auto d-block" alt="" width="50%" height="200vh">
            @else
                <img src="{{ $new->image_path }}" class="rounded mx-auto d-block" alt="" width="50%" height="200vh">
            @endif
            <hr class="my-2">
            @endforeach
        </div>
    </div>
@endsection