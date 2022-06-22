

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
                <div class="card-header">{{ __('Edit state') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('state.update',$state->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('state_code') }}</label>

                            <div class="col-md-6">
                                <select  class="form-select" aria-label="Default select example" @error('country_id') is-invalid @enderror" name="country_id" id="country_id">
                                    @foreach ($country as $ctry)
                                        <option @if ($ctry->id==$state->country_id)
                                            selected
                                        @endif  value="{{ $ctry->id }}">{{ $ctry->name }}</option>
                                    @endforeach
                                </select>

                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $state->name }}" required autocomplete="name" autofocus>

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
                    <form method="POST" action="{{ route('state.destroy',$state->id) }}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-danger">Delete state</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
