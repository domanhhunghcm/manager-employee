
@extends('layouts.main')

@section('content')
<div class="container">
    <a class="row justify-content-end" href="{{route('department.create')}}">Create</a>
    <div class="row justify-content-center">
      @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <form method="GET" action="{{ route('user.index') }}">
        <div class="form-row align-items-center">
            <div class="col">
                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                    placeholder="Jane Doe">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
            </div>
        </div>
    </form>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">department code</th>
                <th scope="col">Name</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($departments as $department)
            <tr>
                <th scope="row">{{$department->id}}</th>
                <td>{{$department->name}}</td>
                <td><a href="{{route("department.edit",$department->id)}}" class="btn btn-warning">Edit</a></td>
              </tr>
            @endforeach

            </tbody>
          </table>
    </div>

</div>
@endsection
