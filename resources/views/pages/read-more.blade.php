@extends('layouts.app')

@section('content')

    <div class="readmore-container container mt-5">

        <div class="readmore-wrapper">
            <section class="left-readmore">
                <div class="readmore-title-wrapper d-flex">
                    <h1 class="readmore-title flex-fill">{{$animal->name}} | TheAnimalLab</h1>
                    @if(Auth::check())
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('animal.updatePage', $animal) }}" class="btn btn-outline-primary h-100">Update Animal Data</a>
                        @endif
                    @endif
                </div>
                <div class="readmore-content-wrapper mt-4">
                    <p class="readmore-description">{{$animal->description}}</p>
                    <div class="readmore-detail">
                        <h2>{{$animal->name}}</h2>
                        <div class="detail-seperator"></div>
                        <img src="{{ asset($animal->image) }}" alt="{{$animal->name}}" width="300" height="200">
                        <div class="detail-seperator"></div>
                        <div class="detail-wrapper mt-2" style="padding: 0px">
                            <div class="detail-left">
                                <p><strong>Height: </strong>{{$animal->height}} (cm)</p>
                                <p><strong>Weight: </strong>{{$animal->weight}} (kg)</p>
                                <p><strong>Color: </strong>{{$animal->color}}</p>
                                <p><strong>Lifespan: </strong>{{$animal->lifespan}} (years)</p>
                                <p><strong>Diet: </strong>{{$animal->diet}}</p>
                                <p><strong>Habitat: </strong>{{$animal->habitat}}</p>
                                <p><strong>Predators: </strong>{{$animal->predators}}</p>
                            </div>
                            <div class="detail-right">
                                <p><strong>Countries: </strong>{{$animal->countries}}</p>
                                <p><strong>Avg Speed: </strong>{{$animal->avgspeed}} (km/h)</p>
                                <p><strong>Top Speed: </strong>{{$animal->topspeed}} (km/h)</p>
                                <p><strong>Status: </strong>{{$animal->conservationStatus}}</p>
                                <p><strong>Family: </strong>{{$animal->family}}</p>
                                <p><strong>Social: </strong>{{$animal->socialStructure}}</p>
                                <p><strong>Gestation: </strong>{{$animal->gestationPeriod}} (days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="right-readmore">

            </section>
        </div>



        <section class="comment-section mt-5" id="comment">
            <h2 class="comment-heading">Comments</h2>

            <div class="space mt-5"></div>
            @if (Session::has('success'))
                <p class="text-success">{{Session::get('success')}}</p>
            @endif

            <!-- check if there is no comments -->
            @if ($comments->isEmpty())
                <div class="comment-wrapper">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="{{ asset('images/stelle.jpeg') }}" alt="stelle-img" width="100px" height="auto">
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <h4>Be the first to comment</h4>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <h5 style="color:grey; text-align:center">Help the {{$animal->name}} community by sharing your thoughts.</h5>
                        </div>
                    </div>
                </div>
            @endif

            <!-- check if there are comments-->
            @if (!$comments->isEmpty())
                @foreach ($comments as $comment)
                    <div class="container-lg mb-3 border-dark border rounded">
                        <div class="row">
                            <div class="col-12 fw-bolder d-flex" style="align-items: center; gap: 5px; margin-top: 10px;">
                                <img src="{{ asset($comment->user->getPicture()) }}" alt="profile-picture" width="30" height="30" style="border-radius: 50%; border: 2px solid black">
                                {{ $comment->user->name }} • {{ $comment->created_at->format('d/m/Y') }}
                                @if (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->id === $comment->user_id))
                                    <form action="{{ route('comment.destroy', ['animal' => $animal, 'comment' => $comment]) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                @endif
                            </div>
                            <div class="col-12 mt-3 lead mb-3 fw-bold">{{ $comment->title }}</div>
                            <div class="col-12 mb-3">{{ $comment->comment }}</div>

                            <!-- Reply Section -->
                            <div class="col-12">
                                <button class="btn btn-link text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#replies-{{ $comment->id }}" aria-expanded="false" aria-controls="replies-{{ $comment->id }}">
                                    View Replies ({{ $comment->replies->count() }})
                                </button>

                                <div class="collapse" id="replies-{{ $comment->id }}">
                                    <div class="card card-body">
                                        @foreach ($comment->replies as $reply)
                                            <div class="mb-2">
                                                <strong>{{ $reply->user->name }}</strong> • {{ $reply->created_at->format('d/m/Y') }}
                                                <p>{{ $reply->comment }}</p>

                                                <!-- Show delete button only for Admin and the user who made the reply -->
                                                @if (Auth::check() && (Auth::user()->id === $reply->user_id || Auth::user()->role === 'admin'))
                                                    <form action="{{ route('comment.delete', $reply) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endforeach

                                        @if (Auth::check())
                                            <form action="{{ route('comment.reply', $comment) }}" method="POST" class="mt-3">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="reply-title-{{ $comment->id }}" class="form-label">Reply Title</label>
                                                    <input name="title" id="reply-title-{{ $comment->id }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="reply-comment-{{ $comment->id }}" class="form-label">Your Reply</label>
                                                    <textarea name="comment" id="reply-comment-{{ $comment->id }}" class="form-control" rows="2" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Reply</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{$comments->onEachSide(2)->links()}}
            @endif

            @if (!Auth::check())
                <p class="lead">Login to comment! <a href="{{ route('login') }}">Login</a></p>
            @endif

            <div class="space mt-5"></div>
            <!-- Comment form -->
            @if (Auth::check())
                <form action="{{ route('comment.store', $animal) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="title">
                    </div>
                    @error('title')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea name="comment" id="comment" cols="30" rows="10" style="display: block; width: 100%; resize:none; padding: 10px"></textarea>
                    </div>
                    @error('comment')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            @endif
        </section>
        <div class="space" style="margin-bottom: 150px"></div>
    </div>

@endsection

