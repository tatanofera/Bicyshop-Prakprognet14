@extends('admin.layout-dashboard')

@section('title', 'BicyShop | Add Product')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">ADD PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product') }}">Back</a>
            </div>
        </div>
    </div>
    <form action=" {{ route('product-add-submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3">
            <div class="p-5 pt-0">
                @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="form-group mb-3">
                    <label for="product_name" class="form-control-label">Product Name</label>
                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" value="{{old('product_name')}}" placeholder="Masukkan nama produk" id="product_name" name="product_name">
                    @error('product_name')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" value="{{old('category_id')}}">
                        <option selected disabled>Pilih kategori</option>
                        @foreach($categories as $value)
                        @if(!old('category_name'))
                        <option class="" value="{{$value->id}}">{{$value->category_name}}</option>
                        @elseif(old('category_name') && old('category_name')==$value->id)
                        <option class="" value="{{old('category_name')}}" selected>{{$value->category_name}}</option>
                        @else
                        <option class="" value="{{$value->id}}">{{$value->category_name}}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('category_name')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col form-group mb-3">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="{{old('price')}}">
                            <span class="input-group-text">.00</span>
                            @error('price')
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col form-group mb-3">
                        <label for="stock" class="form-control-label">Stock</label>
                        <div class="input-group">
                            <input class="form-control @error('stock') is-invalid @enderror" type="number" min="0" id="stock" name="stock" value="{{old('stock')}}" placeholder="Masukkan stok produk">
                            <span class="input-group-text">pcs</span>
                            @error('stock')
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col form-group mb-3">
                        <label for="weight" class="form-control-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control @error('weight') is-invalid @enderror" type="number" min="0" id="weight" name="weight" value="{{old('weight')}}" placeholder="Masukkan berat produk">
                            <span class="input-group-text">kg</span>
                            @error('weight')
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="{{old('price')}}">
                        <span class="input-group-text">.00</span>
                        @error('price')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="stock" class="form-control-label">Stock</label>
                    <div class="input-group">
                        <input class="form-control @error('stock') is-invalid @enderror" type="number" min="0" id="stock" name="stock" value="{{old('stock')}}" placeholder="Masukkan stok produk">
                        <span class="input-group-text">pcs</span>
                        @error('stock')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="weight" class="form-control-label">Weight</label>
                    <div class="input-group">
                        <input class="form-control @error('weight') is-invalid @enderror" type="number" min="0" id="weight" name="weight" value="{{old('weight')}}" placeholder="Masukkan berat produk">
                        <span class="input-group-text">kg</span>
                        @error('weight')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div> -->
                <div class="form-group mb-3 mt-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" placeholder="Masukkan deskripsi produk" id="description" name="description" rows="3"></textarea>
                    @error('description')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="" for="image_name">Product Image</label>
                    <div class="input-group mb-3">
                        <input class="form-control @error('image_name') is-invalid @enderror" id="image_name" name="image_name[]" type="file" multiple>
                        <!-- <label class="@error('image_name') is-invalid @enderror"></label> -->
                        @error('image_name')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <!-- <span class="alert-icon"><i class="ni ni-like-2"></i></span> -->
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection