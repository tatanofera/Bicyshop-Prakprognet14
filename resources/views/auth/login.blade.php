<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{ asset('assets_login_register/https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets_login_register/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
	
	<link rel="stylesheet" href="{{ asset('assets_login_register/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-warning">{{ $error }}</div>
        @endforeach
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url({{ asset('assets_login_register/images/bg-1.jpg)') }};">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Login</h3>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <p></p>
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                                    @if (Route::has('password.request'))
                                            <a class="w-50 text-md-right" href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                    <p>Don't have an account? <a class="text-primary w-50 text-md-right" href="{{ route('register') }}" >Register now</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html