@extends('layouts.main')
@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-registration mt-5">
            <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
                <form action="/register" method="POST">
                    @csrf
                    <div class="box">
                        <div class="form-floating">
                            <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="name" value="{{ old('name') }}" required>
                            <label for="name">Name</label>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" value="{{ old('username') }}" required>
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email" value="{{ old('email') }}" required>
                            <label for="email">Email Address</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                    </div>
                </form>
            <small class="d-block text-center mt-4">
                Alredy Akun?<a href="/login" class="text-decoration-none">&nbsp;Login Now</a>
            </small>
        </main>
    </div>
</div>
@endsection