@extends('layouts.app')

@section('content')
    
    <div class="container-md my-4" style="text-align: center">
        <h1>Explore all types of animals!</h1>
        <p class="lead mt-3">Animals can be categorized into many different categories.</p>
        <p>Social Structure, Family, Habitat, Diet, and many more. Feel free to browse or leave out comments about any animals that caught your attention.</p>
        <p>We aim create a community of people where they can comment and share their thoughts about the animals they love. <strong>To find out more about us, click <a href="{{ route('about-us') }}">here</a></strong></p>
    </div>

    <div class="container-lg">
      <h2>View the comments from out community!</h2>
    </div>
    <div class="forum-wrapper container-lg">
      <aside>
        <ul>
          <a class="{{$filter == 'new' ? 'hover' : ''}}" href="{{ route('forum', ['filter'=>'new']) }}"><li><i class="bi bi-stars {{$filter == 'new' ? 'text-dark': ''}}"></i> New</li></a>
          <a class="{{$filter == 'old' ? 'hover' : ''}}" href="{{ route('forum', ['filter'=>'old']) }}"><li><i class="bi bi-clock-fill {{$filter == 'old' ? 'text-dark': ''}}"></i> Old</li></a>
          <a class="{{$filter == 'mostPopular' ? 'hover' : ''}}" href="{{ route('forum', ['filter'=>'mostPopular']) }}"><li><i class="bi bi-fire {{$filter == 'mostPopular' ? 'text-dark': ''}}"></i> Popular</li></a>
          <a class="{{$filter == 'leastPopular' ? 'hover' : ''}}" href="{{ route('forum', ['filter'=>'leastPopular']) }}"><li><i class="bi bi-hand-thumbs-down-fill {{$filter == 'leastPopular' ? 'text-dark': ''}}"></i> Least Popular</li></a>
          
        </ul>
      </aside>
      <div class="container-lg">
        @foreach ($comments as $comment)
        <div class="card mb-3 " style="max-width: 100%; border: 0">
            <div class="row g-0"style="border: 2px solid gray; padding: 1rem; border-radius: 10px">
              <div class="col-md-4 d-flex justify-content-center" style="align-items: center">
                <a href="{{ route('read-more', $comment->animal) }}" class="forum-img-wrapper">
                  <div class="forum-img-mask rounded"><span>{{$comment->animal->name}}</span></div>
                  <img src="{{ asset($comment->animal->image) }}" class="forum-img img-fluid rounded" alt="{{$comment->title}}">
                </a>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">
                    <img src="{{ asset($comment->user->getPicture()) }}" alt="profile-picture" width="40" height="40"style="border-radius: 50%; border: 2px solid black">
                    {{$comment->user->name}}</h5>
                  <p class="card-text"><strong>{{$comment->title}}</strong></p>
                  <p class="card-text">{{$comment->comment}}</p>

                  @if (Auth::check())
                    @if (Auth::user()->likes()->where('comment_id', $comment->id)->exists())
                      <form action="{{ route('dislike', $comment) }}" method="POST">
                        @csrf
                        <button type="submit" style="border: 0; background: 0"><i class="bi bi-heart-fill text-danger"></i></button>
                        <span>{{$comment->likes()->count()}}</span>
                      </form>
                    @else
                      <form action="{{ route('like', $comment) }}" method="POST">
                        @csrf
                        <button type="submit" style="border: 0; background: 0"><i class="bi bi-heart"></i></button>
                        <span>{{$comment->likes()->count()}}</span>
                      </form>
                    @endif
                  @else
                      <a href="{{ route('login') }}" style="text-decoration: none"><i class="bi bi-heart-fill text-danger"></i></button></a>
                      <span>{{$comment->likes()->count()}}</span>
                  @endif
                  
                  
                  
                  <p class="card-text"><small class="text-body-secondary">Created at {{$comment->created_at->format('d/m/Y')}}</small></p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        {{$comments->links()}}
      </div>
    </div>
    
@endsection

