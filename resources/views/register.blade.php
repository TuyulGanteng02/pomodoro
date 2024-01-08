@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label>Name</label>
                            <input name="username" type="text" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label>Confirm Password</label>                   
                            <input name="password_confirmation" type="password" class="form-control">
                        </div>

                        <a href="{{ route('login') }}">Sudah punya akun? Login</a>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection