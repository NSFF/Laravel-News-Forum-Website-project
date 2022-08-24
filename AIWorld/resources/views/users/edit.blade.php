@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    Edit Profile
                </a>
            </h1>
        </div>
    </div>
@if((isset(Auth::user()->id) && (Auth::user()->id == $user->id || Auth::user()->role_id == 1)))
    <form action="{{ route('users.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <img src="{{ asset('images/'.$user->image_path) }}" class="rounded mx-auto" alt="" width="25%" height="200vh" >
        <div class="form-group mt-2">
            <label for="imageFile">Image</label>
            <input type="file" class="form-control fst-italic bg-white" name="image">
        </div>

        <div class="form-group mt-2">
            <label for="name">User Name</label>
            <input type="text" class="form-control fst-italic bg-white" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group mt-2">
            <label for="email">Email</label>
            <input type="text" class="form-control fst-italic bg-white" name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group mt-2">
            <label for="birthday">Birthday</label>
            <input type="date" class="form-control fst-italic bg-white" name="birthday" value="{{ $user->birthday }}">
        </div>

        <div class="form-group mt-2">
            <label for="about_me">About me</label>
            <textarea type="date" class="form-control fst-italic bg-white" rows="3" name="about_me">{{ $user->about_me }}</textarea>
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
@endif
</div>
@endsection