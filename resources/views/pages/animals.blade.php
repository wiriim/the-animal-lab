@extends('layouts.app')

@section('content')
    
    <div class="container-lg my-4">
        <div class="row">
            @foreach ($animals as $animal)
                <div class="col-md-4 mt-3">
                        <img src="{{ asset('images/placeholder.png') }}" alt="placeholder">
                </div>
                <div class="col-md-8 mt-3">
                        <h3>{{$animal->name}}</h3>
                </div>
            @endforeach
        </div>
    </div>

@endsection

