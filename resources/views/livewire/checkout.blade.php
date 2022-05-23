<?php

  function rupiah ($angka) {
    $hasil = 'Rp. ' . number_format($angka, 0, ",", ".");
    return $hasil;
  }
	$temp_shipping=0;
?>
<div class="row">
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">Checkout Transaksi</h3>
                <p class="text-muted text-center"></p>
                <hr>
                <form action=" {{ route('checkout.confirm') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-3">
                        <div class="p-5 pt-0 pb-3 col-12">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <div class="form-group mb-3">
                                <label for="courier" class="form-control-label">Negara</label>
                                <input class="form-control @error('courier') is-invalid @enderror" type="text" value="Indonesia" readonly placeholder="Masukkan kurir" id="courier" name="courier">
                                @error('courier')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="provinsi" class="form-control-label">Provinsi</label>
                                <select wire:model="input_province" style="width:100%; height:40px;" class="form-select form-select-lg @error('province') is-invalid @enderror" id="province" name="province">
                                    <option class="" value="" selected>Pilih Provinsi</option>
                                    @foreach($provinces as $dd)
                                    <option class="" value="{{$dd->title}}">{{$dd->title}}</option>
                                    @endforeach
                                </select>
                                @error('province')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="kabupaten" class="form-control-label">Kabupaten</label>
                                <select wire:model="input_region" style="width:100%; height:40px;" class="form-select form-select-lg @error('regency') is-invalid @enderror" id="regency" name="regency">
                                    <option class="" value="" selected>Pilih Kabupaten/Kota</option>
                                    @if(!is_null($regions))
                                    @foreach($regions as $dd)
                                    <option class="" value="{{$dd->title}}">{{$dd->title}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('regency')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="courier" class="form-control-label">Ekspedisi</label>
                                <select wire:model="input_courier" style="width:100%; height:40px;" class="form-select form-select-lg @error('courier_id') is-invalid @enderror" id="courier_id" name="courier_id">
                                    <option class="" value="" selected>Pilih Courier</option>
                                    @if(!is_null($couriers))
                                    @foreach($couriers as $dd)
                                    <option class="" value="{{$dd->id}}">{{$dd->courier}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('ekspedisi')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="courier" class="form-control-label">Layanan Ekspedisi</label>
                                <select wire:model="input_service" style="width:100%; height:40px;" class="form-select form-select-lg @error('courier_id') is-invalid @enderror" >
                                    <option class="" value="" selected>Pilih Layanan</option>
                                    @if(!is_null($result))
                                    @foreach($result as $dd)
                                    <option class="" value="{{$dd['description']}}">{{$dd['description']}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @error('ekspedisi')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            @if(!is_null($input_service))
                            <div class="row">
                                <div class="form-group col-6 mb-3">
                                    <label for="courier" class="form-control-label">Biaya Pengiriman</label>
                                    <input class="form-control @error('shipping_cost') is-invalid @enderror" type="text" value="{{ rupiah($temp_biaya) }}" readonly >
                                    @error('shipping_cost')
                                    <div class="alert alert-danger invalid-feedback" role="alert">
                                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6 mb-3">
                                    <label for="courier" class="form-control-label">Estimasi Tiba</label>
                                    <input class="form-control @error('shipping_etd') is-invalid @enderror" type="text" value="{{ $temp_etd }}" readonly name="shipping_etd">
                                    @error('shipping_etd')
                                    <div class="alert alert-danger invalid-feedback" role="alert">
                                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <input class="form-control @error('shipping_etd') is-invalid @enderror" type="number" value="{{ $temp_biaya }}" readonly name="shipping_cost" hidden>
                                    @error('shipping_etd')
                                    <div class="alert alert-danger invalid-feedback" role="alert">
                                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <input class="form-control @error('shipping_etd') is-invalid @enderror" type="number" value="{{ $sub_total_tagihan }}" readonly name="sub_total" hidden>
                                    @error('shipping_etd')
                                    <div class="alert alert-danger invalid-feedback" role="alert">
                                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <input class="form-control @error('shipping_etd') is-invalid @enderror" type="number" value="{{ $total_tagihan }}" readonly name="total" hidden >
                                    @error('shipping_etd')
                                    <div class="alert alert-danger invalid-feedback" role="alert">
                                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                            @endif
                            <div class="form-group mb-3">
                                <label for="kecamatan" class="form-control-label">Alamat {{ $temp_biaya }}</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" type="text" value="" placeholder="Masukkan alamat" id="address" name="address"></textarea>
                                @error('alamat')
                                <div class="alert alert-danger invalid-feedback" role="alert">
                                    <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            
                            <div class="pt-4" style="float:right">
                                <button type="submit" class="btn btn-primary btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
            </div>
        </div>
    </div>
    <!-- Start Order Wrapper -->
    <div class="col-12">
        <div class="your-order-section">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">Detail Transaksi</h3>
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
                            <th scope="col">Subtotal</th>
                          </tr>
                        </thead>
                        <tbody>
                        @if($carts->count()==0)
                            <tr>
                            <td class="text-center" colspan="10">Data detail transaksi tidak ditemukan</td>
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
                            <td style="vertical-align: middle;">{{rupiah($cart->product->price)}}</td>
                            <td style="vertical-align: middle;">{{$cart->qty}}</td>
                            <td style="vertical-align: middle;">{{rupiah($cart->product->price*$cart->qty)}}</td>
                          </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" style="font-weight:bold">Sub total Keseluruhan</td>
                            <td>{{ rupiah($sub_total_tagihan) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="font-weight:bold">Shipping Cost</td>
                            <td>{{ rupiah($temp_biaya) }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="font-weight:bold">Total</td>
                            <td>{{ rupiah($total_tagihan) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
        </div>
    </div> <!-- End Order Wrapper -->
    
</div>

