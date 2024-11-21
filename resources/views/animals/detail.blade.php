@extends('layouts.app')

@section('content')
    
    

    <div class="container-lg my-4">
        <div class="row">
            @foreach ($animals as $animal)
                <div class="container-fluid border rounded border-dark d-flex row mb-3 p-3">
                    <div class="col-md-4">
                        <img src="{{ asset($animal->image) }}" class="rounded" alt="{{$animal->name}}" width="100%" style="max-height: 300px">
                    </div>
                    <div class="col-md-8 mt-3">
                        <h3 style="margin-top: -15px">{{$animal->name}}</h3>
                        <p class="lead mt-1">Family: {{$animal->family}}</p>
                        <p class="lead" style="margin-top: -10px">Diet: {{$animal->diet}}</p>
                        <p>{{{Str::limit($animal->description, 400)}}}</p>
                        <a href="{{ route('read-more', $animal) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
                
            @endforeach
        </div>
        <div class="mt-5"></div>
        {{$animals->onEachSide(2)->links()}}
    </div>

@endsection

