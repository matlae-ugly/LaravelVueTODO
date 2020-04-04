@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border rounded px-5 pt-5 pb-0 bg-black shadow">
                <div class="text-center"><span class="h2">Register</span></div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="name" type="text" placeholder="Enter your name" class="form__field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <label for="name" class="form__label">Enter your name</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="email" type="email" placeholder="Enter your email" class="form__field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <label for="email"  class="form__label">Enter your email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="password" placeholder="Password" type="password" class="form__field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <label for="password" class="form__label">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="password-confirm" type="password" placeholder="Confirm password" class="form__field" name="password_confirmation" required autocomplete="new-password">
                        
                            <label for="password-confirm" class="form__label">{{ __('Confirm Password') }}</label>
                            
                        </div>

                        <div class="form-group row mb-2 mt-4 d-flex justify-content-center">
                            <button type="submit" class="w-50 btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="d-flex mt-3 justify-content-center">
                           
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Already have an account? Log in
                                </a>
                          
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
