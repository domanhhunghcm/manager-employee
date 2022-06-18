
@extends('layouts.main')

@section('content')
<div class="container">
    <a class="row justify-content-end" href="{{route('user.create')}}">Create</a>
    <div class="row justify-content-center">
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{route("user.edit","1")}}" class="btn btn-warning">Edit</a></td>
              </tr>
            @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
