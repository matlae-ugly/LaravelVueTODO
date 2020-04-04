@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border rounded px-5 pt-5 pb-0 bg-white shadow">
                <div class="text-center"><span class="h2">Login</span></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="email" type="email" placeholder="Enter email" class="form__field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email" class="form__label">Enter email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form__group px-5 w-100 field mt-3">
                            <input id="password" type="password" placeholder="Enter password" class="form__field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="password" class="form__label">Enter password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                      

                        <div class="d-flex mb-3 mt-2 justify-content-center">
                            <div class="pretty p-default p-bigger p-curve p-pulse mt-3">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <div class="state p-success">
                        
                                    <label for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                        </div>
     
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="w-50 btn shadow btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="d-flex mt-3 justify-content-center">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                           
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    Register
                                </a>
                          
                            </div>
                        
                    </form>
                </div>
            </div
        </div>
    </div>
</div>
@endsection
