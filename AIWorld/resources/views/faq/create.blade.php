@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="create">
                    Create FAQ
                </a>
            </h1>
        </div>
    </div>

    <form action="/faq" method="POST">
        @csrf
        <div class="form-group mt-2">
            <label for="question">Faq Question</label>
            <input type="text" class="form-control fst-italic bg-white" name="question" placeholder="Faq question...">
        </div>
        <div class="form-group mt-2">
            <label for="answer">Faq Answer</label>
            <textarea class="form-control fst-italic bg-white" rows="3" name="answer" placeholder="Faq answer..."></textarea>
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