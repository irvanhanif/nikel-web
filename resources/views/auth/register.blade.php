@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card bg-white">
                <div class="card-header">Register Form</div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="form-floating col-12 mb-3 px-0">
                                <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                <label for="name">Name</label>
    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-floating col-12 mb-3 px-0">
                                <input id="email"  placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                <label for="email">Email</label>
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating col-12 mb-3 px-0">
                                <input id="password"  placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">Password</label>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
    
                            <div class="form-floating col-12 mb-3 px-0">
                                <input id="password-confirm"  placeholder="Password Confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm Password</label>
    
                            </div>
                        </div>
                        <div class="row justify-content-end mb-2">
                            <div class="col-sm-4 col-md-6">
                                <button type="submit" class="col-12 btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
