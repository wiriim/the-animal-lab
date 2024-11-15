@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-5">
        <form action="{{ route('login') }}" method="POST">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            @if ($errors->has('error'))
              <p class="lead text-danger">{{$errors->first('error')}}</p>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

