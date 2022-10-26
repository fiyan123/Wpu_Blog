@extends('layouts.main')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-5">

        {{-- Alerts Success --}}
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 

        {{-- Alerts Login Failed --}}
        @if(session()->has('loginEror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginEror') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin mt-5">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="POST">
                    @csrf
                    <div class="box">
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                            <label for="email">Email address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                    </div>
                </form>
            <small class="d-block text-center mt-4">
                Not Akun?<a href="/register" class="text-decoration-none">&nbsp;Register Now</a>
            </small>
        </main>
    </div>
</div>
@endsection