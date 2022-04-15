<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{ asset('assets_login_register/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets_login_register/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets_login_register/css/style.css') }}">

</head>

<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url({{ asset('assets/images/Logo.jpeg)') }};">
                    </div>
                    <div class="login-wrap p-4 p-md-5">
                        <div class="d-flex">
                            <div class="w-100">
                                <h3 class="mb-4">Reset Password</h3>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
        
                                <input type="hidden" name="token" value="{{ $token }}">
        
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
        
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Reset Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
