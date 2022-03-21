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
                        <div class="img" style="background-image: url({{ asset('assets_login_register/images/bg-1.jpg)') }};">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Reset Password</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
            
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
            
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                    </div>
            
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('Link Reset Password') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
