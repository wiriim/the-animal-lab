@extends('layouts.app')

@section('content')
    
  <div class="container-lg mt-5 d-flex flex-wrap" style="justify-content: space-between">
    <section class="format-section mb-3">
        <h3>Display Format: Compact</h3>
        <div class="format-buttons d-flex" style="gap: 10px">
          <form action="{{ route('changeFormat', ['format' => 'detail']) }}" method="GET">
              @csrf
              <button type="submit" class="btn btn-primary">Detail View</button>
          </form>
          <form action="{{ route('changeFormat', ['format' => 'compact']) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success">Compact View</button>
          </form>
        </div>
    </section>
    
    <section class="search-section">
        <form action="{{ route('searchAnimal', ['format' => 'compact']) }}" method="GET">
            @csrf
            <label class="form-label lead" for="animalName">Search Animal</label>
            <input class="form-control" type="text" name="animalName" id="animalName" placeholder="Leafy Sea Dragon">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>
    </section>
  </div>

  <div class="container-fluid-lg my-4 d-flex flex-wrap justify-content-center" style="gap: 15px;">
    @if ($animals->isEmpty())
      <h1>Can't find the animal</h1>
      <div class="col-12 d-flex justify-content-center">
        <img src="{{ asset('images/stelle.jpeg') }}" alt="stelle-img" width="100px" height="auto">
      </div>
    @endif

    @foreach ($animals as $animal)
      <div class="card mt-2" style="max-width: 300px;">
        <div class="card-image-container" style="min-height: 200px">
          <img src="{{ asset($animal->image) }}" class="card-img-top" alt="{{$animal->name}}" style="height: 100%; max-height: 200px;">
        </div>
        
        <div class="card-body d-flex flex-column justify-between">
          <h5 class="card-title">{{$animal->name}}</h5>
          <p class="card-text" style="flex: 1">{{{Str::limit($animal->description, 100)}}}</p>
          <a href="{{ route('read-more', $animal) }}" class="btn btn-primary" style="max-width: 105px">Read More</a>
        </div>
      </div>
      @endforeach
  </div>
  <div class="container-lg">
    <div class="mt-5"></div>
    {{$animals->onEachSide(2)->links()}}
  </div>
@endsection

