@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf 
                        
                        <div class="form-group row">
                            <label>Nama</label>
                            <input name="username" type="text" class="form-control">
                        </div>

                        <div class="form-group row">
                            <label>Password</label>    
                            <input name="password" type="password" class="form-control">                        
                        </div>

                        <a href="{{ route('register') }}">Belum punya akun? Daftar</a>

                        <div class="form-group row mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection