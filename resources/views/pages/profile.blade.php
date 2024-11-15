@extends('layouts.app')

@section('content')
    
    <div class="container-lg mt-4">
        <div class="fw-bolder">{{Auth::user()->name}}</div>
        <div class="">{{Auth::user()->email}}</div>
        <form action="{{ route('logout') }}" method="post" class="mt-4">
            @csrf
            <button class="btn btn-light border-dark" type="submit">Logout</button>
        </form>
        
    </div>

@endsection

