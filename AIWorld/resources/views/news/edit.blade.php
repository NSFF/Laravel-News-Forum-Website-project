@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="edit">
                    Edit news
                </a>
            </h1>
        </div>
    </div>

    <form action="/news/{{ $news->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="{{ asset('images/'.$news->image_path) }}" class="rounded mx-auto d-block" alt="" width="50%" height="200vh" >
        <div class="form-group mt-2">
            <label for="imageFile">Image</label>
            <input type="file" class="form-control fst-italic bg-white" name="image">
        </div>
        <div class="form-group mt-2">
            <label for="newsTitle">News Title</label>
            <input type="text" class="form-control fst-italic bg-white" name="title" value="{{ $news->title }}">
        </div>
        <div class="form-group mt-2">
            <label for="newsContent">News Content</label>
            <textarea class="form-control fst-italic bg-white" rows="3" name="content" >{{ $news->content }}</textarea>
        </div>

        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                <li class="text-danger">
                    {{ $error }}
                </li>
                @endforeach
            </div>
        @endif
        
        <button type="submit" class="btn btn-primary my-2">
            Submit
        </button>
    </form>
</div>
@endsection