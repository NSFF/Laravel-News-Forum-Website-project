@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    FAQ
                </a>
            </h1>
        </div>
    </div>

    @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1))    
        <div class="mx-4">
            <a href="faq/create" class="fst-italic">
                Create FAQ &rarr;
            </a>
        </div>
    @endif

    <div class="mx-4">
        <div class="text-start">            
            @foreach ($faqs as $faq)
            <div class="float-end">
                @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1))                        
                    <a href="faq/{{ $faq->id }}/edit" class="fst-italic">
                        Edit &rarr;
                    </a>
                    <form action="faq/{{ $faq->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="float-end p-0 btn btn-link">
                            Delete &rarr;
                        </button>
                    </form>
                @endif
            </div>
            <h2 class="fw-bold">
                <a class="nav-link px-0 py-0 dropdown-toggle" data-bs-toggle="collapse" href="#collapse{{ $faq->id }}" role="button" aria-expanded="false" aria-controls="collapse">
                    {{ $faq->question }}
                </a>
            </h2>
            <div class="collapse" id="collapse{{ $faq->id }}">
                <p class="my-1">
                    {{ $faq->answer }}
                </p>
            </div>
            <hr class="my-2">
            @endforeach
        </div>
    </div>
@endsection