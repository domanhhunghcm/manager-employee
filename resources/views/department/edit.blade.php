

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-error">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-header">{{ __('Edit country') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('country.update',$country->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('country_code') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('$country->country_code') is-invalid @enderror" name="country_code" value="{{ $country->country_code }}" required autocomplete="country_code" autofocus>

                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $country->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer justify-content-between">
                    <form method="POST" action="{{ route('country.destroy',$country->id) }}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">Delete User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
