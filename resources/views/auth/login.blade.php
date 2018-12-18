@extends('layouts.app')

@section('content')
<div class="w-screen h-screen main-header">
    <div class="row justify-content-center">
        <div class="md:w-1/3 md:m-auto all:w-full">
            <div class="p-2 mt-16">
                <div class="font-bold text-lg p-2">Login</div>
                <div class="pb-2 pl-2">Insert your details</div>
                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="pt-2 pb-2">
                            <label for="email" class="pl-2 block">{{ __('E-Mail Address') }}</label>

                            <div class="w-full pl-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="pt-2 pb-2">
                            <label for="password" class="pl-2 block">{{ __('Password') }}</label>

                            <div class="w-full pl-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="pl-12 mt-2">
                                <div class="">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="w-full px-4">
                                <button type="submit" class="rounded p-2 main-button w-full">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="block mt-2" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
