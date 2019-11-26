<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ads login page ">
    <meta name="author" content="Ads public school">

    <title>ADS | Login</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/floating-labels.css')}}" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="text-center mb-4">
        <img class="mb-4" src="{{asset('media/images/logo/logo_100X80_64.gif')}}" alt=""  height="72">
        <h1 class="h3 mb-3 font-weight-normal">{{ config('app.name', 'PRA') }}</h1>
      </div>

      @error('email')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Wrong</strong> credentials !
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
      @enderror

      
      @error('password')
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Wrong</strong> credentials !
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
      @enderror

      <div class="form-label-group">
        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 100%"  placeholder="Email address">
        <label for="email">Email address</label>
        
      </div>

     

      <div class="form-label-group">
        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus style="width: 100%"  placeholder="password address">
        <label for="password">Password address</label>
      </div>

      {{-- <div class="form-label-group">
        <input id="password" type="password" class=" @error('password') is-invalid @enderror" style="width: 100%" name="password" required autocomplete="current-password">
        <label for="inputPassword">Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div> --}}

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                              


      <p class="mt-5 mb-3 text-muted text-center"> <a href="{{route('welcome')}}"> ADS Public School</a>&copy; 2017-2018</p>
    </form>
  </body>

  <script src="{{asset('js/app.js')}}"></script>
</html>












{{-- @extends('layouts.app')

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
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
@endsection --}}
