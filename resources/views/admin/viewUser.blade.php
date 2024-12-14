@extends('layouts.app')

@section('content')
@session('deleted')
    <div class="alert alert-success">
        User Successfully Deleted
    </div>
@endsession

<div class="container-lg mt-2 d-flex" style="justify-content: center; width: 100%">
    <div class="row  justify-content-center" style="min-height: 480px; width: 100%">
        <div class="col" style="width: 100%">
            <br>
            <h1>View Users</h1>
            <hr>
            <table class="table" style="width: 100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            @if(Auth::check())
                                @if (Auth::user()->role === 'admin')
                                    <td>
                                        <form action="{{ route('admin.deleteUser', ['id'=>$user->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <div class="row mt-2">
                {{$users->links()}}
            </div>
            <br>
            <a href="{{ route('home') }}" class="btn btn-dark">Back</a>
        </div>
    </div>
</div>


@endsection
