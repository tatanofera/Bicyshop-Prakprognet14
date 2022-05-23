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

    <!-- menunya kita taruh persis di bawah <body> -->
    @include('layouts.menu')

    <div class="container-fluid container" style="margin-top:150px;">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">Cart User</h3>
                        <p class="text-muted text-center"></p>
                        <hr>
                        <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @if($carts->count()==0)
                                <tr>
                                <td class="text-center" colspan="10">Data cart tidak ditemukan</td>
                                </tr>
                            @endif
                            @foreach($carts as $cart)
                              <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <?php $i=0; ?>
                                @foreach($cart->product->product_image as $dd)
                                @if($i==0)
                                <th><img class="img-fluid" src="{{asset('storage/'.$dd->image_name)}}" alt="" style="width:100px;"></th>
                                @endif
                                <?php $i=1;?>
                                @endforeach
                                <td style="vertical-align: middle;">{{$cart->product->product_name}}</td>
                                <td style="vertical-align: middle;">{{$cart->product->price}}</td>
                                <td style="vertical-align: middle;">{{$cart->qty}}</td>
                                <td class="align-middle">
                                    <form action="{{route('cart.delete', $cart->id)}}" method="POST">
                                        @csrf
                                        <a type="button" class="btn btn-primary" href="">
                                            <i class="bi bi-pencil-square"></i>
                                            <span> Edit</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus cart ini?');">
                                            <i class="bi bi-trash3"></i>
                                            <span> Delete</span>                              
                                        </button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                              
                            </tbody>
                        </table>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="float:right; margin-top:75px">
            <a class="btn btn-primary" href="{{ route('checkout') }}">
                <i class="bi bi-pencil-square"></i>
                <span> Checkout</span>
            </a>
        </div>
    </div>
</body>

</html>