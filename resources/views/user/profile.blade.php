<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <title>{{ $title }}</title>

</head>

<body>

    <!-- ** Header Area Start ** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ** Logo Start ** -->
                        <a href="{{ route('landing') }}" class="logo">
                            <img src="assets/images/Logo.jpeg" style="width: 80px; heigh: 80px">
                        </a>
                        <!-- ** Logo End ** -->
                        <!-- ** Menu Start ** -->
                        <ul class="nav">
                            <div class="col-20">
                                <li class="submenu">
                                    <a href="javascript:;">
                                        {{ Auth::user()->user_name }}
                                    </a>
                                    <ul>
                                        <li><a href="{{ route('userprofile') }}">Profile</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout
                                            </a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            </div>
                            <a class='menu-trigger'>
                                <span>Menu</span>
                            </a>
                            <!-- ** Menu End ** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ** Header Area End ** -->

    <div class="container-fluid" style="margin-top:150px;">
        <div class="row justify-content-center">
            <div class="col col-lg-4 col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="{{ asset('img/avatar4.png') }}" alt="profil" class="profile-user-img img-responsive img-circle-elevation-2">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->user_name }}</h3>
                        <p class="text-muted text-center">Terverifikasi pada {{ Auth::user()->email_verified_at }}</p>
                        <hr>
                        <strong>
                            <i class="fas fa-envelope mr-2"></i>
                            Email
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->email }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-map-marker mr-2"></i>
                            Alamat
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->alamat }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-phone mr-2"></i>
                            Telepon
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->telepon }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>