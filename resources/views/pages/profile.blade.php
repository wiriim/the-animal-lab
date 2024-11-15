@extends('layouts.app')

@section('content')
    
    <div class="container-lg">
        <div class="fw-bolder">{{Auth::user()->name}}</div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-light border-dark" type="submit">Logout</button>
        </form>
        
    </div>

@endsection

