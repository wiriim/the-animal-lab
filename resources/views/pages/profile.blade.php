@extends('layouts.app')

@section('content')
    
    <div class="container-lg">
        <div class="fw-bolder">{{Auth::user()->name}}</div>
        <a class="btn btn-light border-black" href="#" role="button">Logout</a>
    </div>

@endsection

