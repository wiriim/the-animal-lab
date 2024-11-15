@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">
      @if(Session::has('success'))
        <p class="text-success">{{Session::get('success')}}</p>
      @endif
        <form action="{{ route('login') }}" method="POST">
          @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="password">
            </div>
            @if ($errors->has('error'))
              <p class="lead text-danger">{{$errors->first('error')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register Here</a></p>
    </div>

@endsection

