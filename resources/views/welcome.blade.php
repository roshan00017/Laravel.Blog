@extends('layouts')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to Blog App') }}</div>

                    <div class="card-body">
                        <p>{{ __('Please log in or register to continue.') }}</p>
                        <div class="d-flex justify-content-between">
                            <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Log in') }}</a>
                            <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegisterModal">
                            Register
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
