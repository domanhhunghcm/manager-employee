
@extends('layouts.main')

@section('content')
<div class="container">
    <a class="row justify-content-end" href="{{route('country.create')}}">Create</a>
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
                <th scope="col">Country code</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($countries as $country)
            <tr>
                <th scope="row">{{$country->id}}</th>
                <td>{{$country->country_code}}</td>
                <td>{{$country->name}}</td>
                <td><a href="{{route("country.edit",$country->id)}}" class="btn btn-warning">Edit</a></td>
              </tr>
            @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
