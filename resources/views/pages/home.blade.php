@extends('layouts.app')

@section('content')
    
    <div class="home-bg">
        <div class="content-mask">
            <div class="content display-1">The Animal Lab</div>
            <a href="{{ route('animals') }}" class="content btn btn-outline-light mt-1">Explore</a>
        </div>
        
    </div>

@endsection

