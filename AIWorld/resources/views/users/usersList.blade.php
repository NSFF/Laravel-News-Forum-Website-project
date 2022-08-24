@extends('layouts.app')

@section('content')
    <div class="mx-auto">
        <div class="text-center">
            <h1 class="fw-bold">
                <a class="nav-link px-0 py-0" href="">
                    User List
                </a>
            </h1>
        </div>
    </div>
    @if (isset(Auth::user()->id) && (Auth::user()->role_id == 1)) 
        @foreach($users as $user)
            <div class="mx-4">
                <div class="text-start">
                    <div class="float-end">
                                            
                            <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="float-end p-0 btn btn-link">
                                    Delete
                                </button>
                            </form>
                            @if($user->role_id == 0)
                            <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="float-end py-0 px-2 btn btn-link">
                                    Add Admin
                                </button>
                                <input type="hidden" value="1" name="role_id" />
                            </form>
                            @elseif($user->role_id == 1)
                                <form action="/users/{{ $user->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="float-end py-0 px-2 btn btn-link">
                                        Revoke Admin
                                    </button>
                                    <input type="hidden" value="0" name="role_id" />
                                </form>
                            @endif
                        
                    </div>            
                    
                    @if($user->role_id == 1)
                        <span class="fw-bold">
                            Admin
                        </span>
                    @endif

                    <a href="../../users/{{ $user->id }}/{{ $user->name }}" class="fst-italic">
                        {{ $user->name }}
                    </a>

                    <span class="fst-italic">
                        {{ $user->email }}
                    </span>

                    <span class="fst-italic">
                        {{ $user->updated_at }}
                    </span>
                    <hr class="my-2">
                </div>
            </div>
        @endforeach
    @endif
@endsection