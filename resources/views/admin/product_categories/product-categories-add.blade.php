@extends('admin.layout-dashboard')

@section('title', 'BicyShop | Add Product Categories')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h1 class="mb-0">ADD PRODUCT CATEGORIES</h1>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product-categories') }}">Back</a>
            </div>
        </div>
    </div>
    <form action=" {{ route('product-categories-add-submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <div class="p-5 pt-0 pb-3">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="form-group mb-0">
                    <label for="category_name" class="form-control-label">Category</label>
                    <input class="form-control @error('category_name') is-invalid @enderror" type="text" value="{{old('category_name')}}" placeholder="Masukkan kategori" id="category_name" name="category_name">
                    @error('category_name')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="text-center pt-4">
                    <button type="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection