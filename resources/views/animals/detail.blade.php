@extends('layouts.app')



@section('content')
    
    <div class="container-lg mt-5 d-flex flex-wrap" style="justify-content: space-between">
        <section class="format-section mb-3">
            <h3>Display Format: Detail</h3>
            <form action="{{ route('changeFormat', ['format' => 'compact']) }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary">Compact View</button>
            </form>
        </section>
        
        <section class="search-section">
            <form action="{{ route('searchAnimal', ['format' => 'detail']) }}" method="GET">
                @csrf
                <label class="form-label lead" for="animalName">Search Animal</label>
                <input class="form-control" type="text" name="animalName" id="animalName" placeholder="Leafy Sea Dragon">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
            </form>
        </section>
    </div>

    <div class="container-lg my-4">
        <div class="d-flex" style="flex-direction: column; align-items: center">
            @if ($animals->isEmpty())
                <h1>Can't find the animal</h1>
                <div class="col-12 d-flex justify-content-center">
                    <img src="{{ asset('images/stelle.jpeg') }}" alt="stelle-img" width="100px" height="auto">
                </div>
            @endif
        </div>
        
        <div class="row ms-3">
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

