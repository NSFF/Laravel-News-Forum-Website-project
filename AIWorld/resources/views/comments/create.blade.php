@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="create">
                    Create Comment
                </a>
            </h1>
        </div>
    </div>

    <form action="{{ route('comments.post.store', $postId) }}" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="comment">Comment</label>
            <textarea class="form-control fst-italic bg-white" rows="3" name="content" placeholder="comment"></textarea>
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