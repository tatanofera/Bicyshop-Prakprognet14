@extends('admin.layout-dashboard')

@section('title', 'BicyShop | Add Discount')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">ADD DISCOUNT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('discount') }}">Back</a>
            </div>
        </div>
    </div>
    <form action=" {{ route('discount-add-submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <div class="p-5 pt-0">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="form-group mb-3">
                    <label for="product_id">Product</label>
                    <select class="form-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" value="{{old('product_id')}}">
                        <option selected disabled>Pilih produk</option>
                        @foreach($products as $value)
                        @if(!old('product_name'))
                        <option class="" value="{{$value->id}}">{{$value->product_name}}</option>
                        @elseif(old('product_name') && old('product_name')==$value->id)
                        <option class="" value="{{old('product_name')}}" selected>{{$value->product_name}}</option>
                        @else
                        <option class="" value="{{$value->id}}">{{$value->product_name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('product_id')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col form-group mb-3">
                        <label for="start" class="form-control-label">Discount Start</label>
                        <input class="form-control @error('start') is-invalid @enderror" type="date" value="{{old('start')}}" id="start" name="start">
                        @error('start')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group mb-3">
                        <label for="end" class="form-control-label">Discount End</label>
                        <input class="form-control @error('end') is-invalid @enderror" type="date" value="{{old('end')}}" id="end" name="end">
                        @error('end')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group mb-3">
                        <label for="percentage">Percentage</label>
                        <div class="input-group">
                            <input type="number" class="form-control @error('percentage') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="percentage" placeholder="Masukkan diskon produk" name="percentage" value="{{old('percentage')}}">
                            <span class="input-group-text">%</span>
                            @error('percentage')
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="start" class="form-control-label">Discount Start</label>
                    <input class="form-control @error('start') is-invalid @enderror" type="date" value="{{old('start')}}" id="start" name="start">
                    @error('start')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="end" class="form-control-label">Discount End</label>
                    <input class="form-control @error('end') is-invalid @enderror" type="date" value="{{old('end')}}" id="end" name="end">
                    @error('end')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div> -->
                <!-- <div class="form-group mb-3">
                    <label for="percentage">Percentage</label>
                    <div class="input-group">
                        <input type="number" class="form-control @error('percentage') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="percentage" placeholder="Masukkan diskon produk" name="percentage" value="{{old('percentage')}}">
                        <span class="input-group-text">%</span>
                        @error('percentage')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div> -->
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection