@extends('layouts.app')

@section('content')
    
    <div class="profile-container container-lg mt-5 d-flex" style="gap: 25px">
        <div class="profile-informations">
            <h1 class="fw-bolder text-center">{{Auth::user()->name}}</h1>
            <div class="image profile-image-wrapper">
                <img class="profile-image" src="{{ asset(Auth::user()->getPicture()) }}" alt="placeholder">
            </div>
            <div class="fs-5"><strong>Email: </strong>{{Auth::user()->email}}</div>
            <a href="{{ route('edit') }}" class="btn btn-primary">Edit Profile</a>
            <form action="{{ route('logout') }}" method="post" class="mt-4">
                @csrf
                <button class="btn btn-light border-dark" type="submit">Logout</button>
            </form>
        </div>
        <div class="seperator" style="width: 5px; background: black"></div>
        <div class="profile-comments" style="width: 100%;">
            <div class="container-lg">
                <h1 class="mb-5">Comments</h1>
                @if ($comments->isEmpty())
                    <h2>You have not commented anything</h2>
                @endif
                @if (!($comments->isEmpty()))
                    @foreach ($comments as $comment)
                        <div class="container-lg mb-3 border-dark border rounded">
                            <div class="row">
                                <div class="col-12 fw-bolder mt-1 d-flex" style="position: relative">
                                    {{$comment->user->name}} • {{$comment->created_at->format('d/m/Y')}}
                                    @if (Auth::user()->role === 'admin' || Auth::user()->id === $comment->user_id)
                                        <a href="{{ route('comment.destroy', ['animal'=> $comment->animal, 'comment'=>$comment]) }}" class="ms-auto"><i class="bi bi-trash text-danger fs-4" style="position: absolute; right: 15px;"></i></a>
                                    @endif
                                </div>
                                <a href="{{ route('read-more', $comment->animal) }}"><em>{{$comment->animal->name}}</em></a>
                                <div class="col-12 mt-2 lead mb-2 fw-bold">{{$comment->title}}</div>
                                <div class="col-12 mb-3">{{$comment->comment}}</div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        
    </div>

@endsection

