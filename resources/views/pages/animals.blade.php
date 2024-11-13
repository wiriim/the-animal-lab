@extends('layouts.app')

@section('content')
    
    <div class="container-lg my-4">
        <div class="row">
            @foreach ($animals as $animal)
                <div class="col-md-4 mt-3">
                        <img src="{{ asset($animal->image) }}" alt="placeholder" width="100%">
                </div>
                <div class="col-md-8 mt-3">
                        <h3>{{$animal->name}}</h3>
                </div>
            @endforeach
        </div>
        <div class="mt-5"></div>
        {{$animals->onEachSide(2)->links()}}
    </div>

@endsection

