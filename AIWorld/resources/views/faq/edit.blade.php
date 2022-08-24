@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="edit">
                    Edit FAQ
                </a>
            </h1>
        </div>
    </div>

    <form action="/faq/{{ $faq->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-2">
            <label for="question">Faq Question</label>
            <input type="text" class="form-control fst-italic bg-white" name="question" value="{{ $faq->question }}">
        </div>
        <div class="form-group mt-2">
            <label for="answer">Faq Answer</label>
            <textarea class="form-control fst-italic bg-white" rows="3" name="answer">{{ $faq->answer }}</textarea>
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