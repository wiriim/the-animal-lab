@extends('layouts.app')

@section('content')
    
  <div class="container-lg mt-5">
    <h3>Display Format: Compact</h3>
    <form action="{{ route('changeFormat', ['format' => 'detail']) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Detail View</button>
    </form>
  </div>

  <div class="container-fluid-lg my-4 d-flex flex-wrap justify-content-center" style="gap: 15px;">
    @foreach ($animals as $animal)
      <div class="card mt-2" style="max-width: 300px;">
        <div class="card-image-container" style="min-height: 200px">
          <img src="{{ asset($animal->image) }}" class="card-img-top" alt="{{$animal->name}}" style="max-height: 200px;">
        </div>
        
        <div class="card-body">
          <h5 class="card-title">{{$animal->name}}</h5>
          <p class="card-text">{{{Str::limit($animal->description, 100)}}}</p>
          <a href="{{ route('read-more', $animal) }}" class="btn btn-primary">Read More</a>
        </div>
      </div>
      @endforeach
  </div>
  <div class="container-lg">
    <div class="mt-5"></div>
    {{$animals->onEachSide(2)->links()}}
  </div>
@endsection

