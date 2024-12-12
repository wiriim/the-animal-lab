@extends('layouts.app')
@section('content')
@session('success')
    <div class="alert alert-success">
        Animal Succesfully Added
    </div>
@endsession
<br>
<div class="container">
    <h1>Add New Animal</h1>
    <form class="row g-4" action="{{ route('animal.added') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="height" class="form-label">Height</label>
            <div class="input-group">
                <input type="text" class="form-control" id="height" name="height" value="{{old('height')}}">
                <span class="input-group-text" id="basic-addon2">cm</span>
            </div>
            @error('height')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="weight" class="form-label">Weight</label>
            <div class="input-group">
                <input type="text" class="form-control" id="weight" name="weight" value="{{old('weight')}}">
                <span class="input-group-text" id="basic-addon2">kg</span>
            </div>
            @error('weight')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="{{old('color')}}">
            @error('color')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="lifespan" class="form-label">Lifespan</label>
            <div class="input-group">
                <input type="text" class="form-control" id="lifespan" name="lifespan" value="{{old('lifespan')}}">
                <span class="input-group-text" id="basic-addon2">years</span>
            </div>

            @error('lifespan')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="diet" class="form-label">Diet</label>
            <input type="text" class="form-control" id="diet" name="diet" value="{{old('diet')}}">
            @error('diet')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="habitat" class="form-label">Habitat</label>
            <input type="text" class="form-control" id="habitat" name="habitat" value="{{old('habitat')}}">
            @error('habitat')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="predators" class="form-label">Predators</label>
            <input type="text" class="form-control" id="predators" name="predators" value="{{old('predators')}}">
            @error('predators')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="avgspeed" class="form-label">Average Speed</label>
            <div class="input-group">
                <input type="text" class="form-control" id="avgspeed" name="avgspeed" value="{{old('avgspeed')}}">
                <span class="input-group-text" id="basic-addon2">km/h</span>
            </div>

            @error('avgspeed')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="topspeed" class="form-label">Top Speed</label>
            <div class="input-group">
                <input type="text" class="form-control" id="topspeed" name="topspeed" value="{{old('topspeed')}}">
                <span class="input-group-text" id="basic-addon2">km/h</span>
            </div>
            @error('topspeed')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="countries" class="form-label">Countries</label>
            <input type="text" class="form-control" id="countries" name="countries" value="{{old('countries')}}">
            @error('countries')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="conservationStatus" class="form-label">Conservation Status</label>
            <input type="text" class="form-control" id="conservationStatus" name="conservationStatus" value="{{old('conservationStatus')}}">
            @error('conservationStatus')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-3">
            <label for="family" class="form-label">Family</label>
            <input type="text" class="form-control" id="family" name="family" value="{{old('family')}}">
            @error('family')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="gestationPeriod" class="form-label">Gestation Period</label>
            <div class="input-group">
                <input type="text" class="form-control" id="gestationPeriod" name="gestationPeriod" value="{{old('gestationPeriod')}}">
                <span class="input-group-text" id="basic-addon2">days</span>
            </div>
            @error('gestationPeriod')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="socialStructure" class="form-label">Social Structure</label>
            <input type="text" class="form-control" id="socialStructure" name="socialStructure" value="{{old('socialStructure')}}">
            @error('socialStructure')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="image" class="form-label">Image</label>
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
                <span class="input-group-text" id="basic-addon2">.jpg</span>
            </div>
            @error('image')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
            @error('description')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <br>
        <div class="col-3">
            <button type="submit" class="btn btn-primary">Add Animal</button>
        </div>
    </form>
    <br> <br>
    <a href="{{ route('animals') }}" class="btn btn-dark">Back</a>
</div>
@endsection
