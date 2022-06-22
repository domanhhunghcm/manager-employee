
@extends('layouts.main')

@section('content')
<div class="container">
    <a class="row justify-content-end" href="{{route('state.create')}}">Create</a>
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
                <th scope="col">country code</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($state as $state)
            <tr>
                <th scope="row">{{$state->id}}</th>
                <td>{{$state->country->name}}</td>
                <td>{{$state->name}}</td>
                <td><a href="{{route("state.edit",$state->id)}}" class="btn btn-warning">Edit</a></td>
              </tr>
            @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
