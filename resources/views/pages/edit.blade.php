@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">
        <div class="edit-informations mb-5">
            <form action="{{ route('edit') }}" enctype="multipart/form-data" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <div class="image profile-image-wrapper">
                        <img class="profile-image" src="{{ asset(Auth::user()->getPicture()) }}" alt="placeholder">
                    </div>
                    <label for="picture" class="form-label">Picture</label>
                    <input name="picture" type="file" class="form-control" id="picture">
                </div>
                @error('picture')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input name="name" type="name" class="form-control" id="name" aria-describedby="name" placeholder="{{Auth::user()->name}}">
                </div>
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="{{Auth::user()->email}}">
                </div>
                @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
                
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

@endsection

