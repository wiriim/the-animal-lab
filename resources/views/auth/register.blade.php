@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
          </div>
          @error('name')
              <div class="alert alert-danger">{{$message}}</div>
          @enderror
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            @error('email')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
            </div>
            @error('password')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <div class="mb-3">
                <label for="confPassword" class="form-label">Confirm Password</label>
                <input name="confPassword" type="password" class="form-control" id="confPassword">
            </div>
            @error('confPassword')
              <div class="alert alert-danger">{{$message}}</div>
            @enderror
  
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <p>Have an account? <a href="{{ route('login') }}">Login Here</a></p>
    </div>

@endsection

