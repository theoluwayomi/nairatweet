@extends('layouts.app')

@section('title', 'Nairatwt Login Page')
@section('content')
<section id="content">
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <form role="form" class="register-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Sign in <small>manage your account</small></h2>
                    <hr>

                    <div class="form-group">
                        <input type="text" name="user_name" id="user_name" class="form-control input-lg @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" placeholder="User Name" tabindex="4">
                        @error('user_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <button type="button" class="btn" data-color="info" tabindex="7">Remember me</button>
                                <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1" {{ old('remember') ? 'checked' : '' }}>
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        <div class="col-xs-12 col-md-6">Don't have an account? <a href="{{ route('register') }}">Register</a></div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>
@endsection
