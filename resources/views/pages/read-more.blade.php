@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">

        <section class="detail-section">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset($animal->image) }}" alt="{{$animal->name}}" width="100%" class="rounded border border-dark border-2" style="max-height: 300px">
                </div>
                <div class="col-md-3 mt-2">
                    <p><span class="fw-bold">Name: </span> {{$animal->name}}</p>
                    <p><span class="fw-bold">Family: </span> {{$animal->family}}</p>
                    <p><span class="fw-bold">Diet: </span> {{$animal->diet}}</p>
                    <p><span class="fw-bold">Habitat: </span> {{$animal->habitat}}</p>
                    <p><span class="fw-bold">Predators: </span> {{$animal->predators}}</p>
                    
                </div>
                <div class="col-md-3 mt-2">
                    <p><span class="fw-bold">Countries: </span> {{$animal->countries}}</p>
                    <p><span class="fw-bold">Conservation Status: </span> {{$animal->conservationStatus}}</p>
                    <p><span class="fw-bold">Social Structure: </span> {{$animal->socialStructure}}</p>
                    <p><span class="fw-bold">Color: </span> {{$animal->color}}</p>
                    <p><span class="fw-bold">Height: </span> {{$animal->height}} (cm)</p>
                </div>
                <div class="col-md-3 mt-2">
                    <p><span class="fw-bold">Weight: </span> {{$animal->weight}} (kg)</p>
                    <p><span class="fw-bold">Lifespan: </span> {{$animal->lifespan}} (years)</p>
                    <p><span class="fw-bold">Average Speed: </span> {{$animal->avgspeed}} (km/h)</p>
                    <p><span class="fw-bold">Top Speed: </span> {{$animal->topspeed}} (km/h)</p>
                    <p><span class="fw-bold">Gestation Period: </span> {{$animal->gestationPeriod}} (days)</p>
                </div>
            </div>
        </section>
        

        <section class="description-section">
            <div class="accordion mt-4 border-dark border rounded" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Article
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          <p class="comment-description">{{$animal->description}}</p>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="comment-section mt-5">
            <h1 class="comment-heading">Comments</h1>

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
                            <div class="col-12 fw-bolder mt-1 d-flex" style="position: relative">
                                {{$comment->user->name}} • {{$comment->created_at->format('d/m/Y')}}
                                @if (Auth::check() && Auth::user()->id == $comment->user_id)
                                    <a href="{{ route('comment.destroy', ['animal'=>$animal, 'comment'=>$comment]) }}" class="ms-auto"><i class="bi bi-trash text-danger fs-4" style="position: absolute; right: 15px;"></i></a>
                                @endif
                            </div>
                            <div class="col-12 mt-3 lead mb-3 fw-bold">{{$comment->title}}</div>
                            <div class="col-12 mb-3">{{$comment->comment}}</div>
                        </div>
                    </div>
                @endforeach
                {{$comments->onEachSide(2)->links()}}
            @endif

            @if (!Auth::check())
                <p class="lead">Login to comment! <a href="{{ route('login') }}">Login</a></p>
            @endif

            <div class="space mt-5"></div>
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

