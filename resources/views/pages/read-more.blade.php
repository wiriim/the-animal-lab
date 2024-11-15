@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">
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
        <p class="mt-4">{{$animal->description}}</p>

    </div>

@endsection

