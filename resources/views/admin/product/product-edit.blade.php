@extends('admin.layout-dashboard')

@section('title', 'BicyShop | Edit Product')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">EDIT PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product') }}">Back</a>
            </div>
        </div>
    </div>
    <form action=" {{ route('product-edit-submit', $products->id) }}" method="POST" enctype="multipart/form-data">
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
                    <input class="form-control @error('product_name') is-invalid @enderror" type="text" value="{{$products->product_name}}" placeholder="Masukkan nama produk" id="product_name" name="product_name">
                    @error('product_name')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="category_id" class="form-control-label">Category</label>
                    <input class="form-control @error('category_id') is-invalid @enderror" type="text" value="{{$det_categories->Product_categories->category_name}}" placeholder="Masukkan nama produk" id="category_id" name="category_id" disabled>
                    @error('category_id')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div> -->
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" value="">
                        <option selected disabled>Pilih kategori</option>
                        @foreach($categories as $value)
                        <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                        <!-- @if(!old('category_name'))
                        <option class="" value="{{$value->id}}">{{$value->category_name}}</option>
                        @elseif(old('category_name') && old('category_name')==$value->id)
                        <option class="" value="{{old('category_name')}}" selected>{{$value->category_name}}</option>
                        @else
                        <option class="" value="{{$value->id}}">{{$value->category_name}}</option>
                        @endif -->
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col form-group mb-3">
                        <label for="price">Price</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="{{$products->price}}">
                            <span class="input-group-text">.00</span>
                            @error('price')
                            <div class="alert alert-danger invalid-feedback" role="alert">
                                <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col form-group mb-3">
                        <label for="stock" class="form-control-label">Stock</label>
                        <div class="input-group">
                            <input class="form-control @error('stock') is-invalid @enderror" type="number" min="0" id="stock" name="stock" value="{{$products->stock}}" placeholder="Masukkan stok produk">
                            <span class="input-group-text">pcs</span>
                        </div>
                        @error('stock')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col form-group mb-3">
                        <label for="weight" class="form-control-label">Weight</label>
                        <div class="input-group">
                            <input class="form-control @error('weight') is-invalid @enderror" type="number" min="0" id="weight" name="weight" value="{{$products->weight}}" placeholder="Masukkan berat produk">
                            <span class="input-group-text">kg</span>
                        </div>
                        @error('weight')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <!-- <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" min="0" id="price" placeholder="Masukkan harga jual produk" name="price" value="{{$products->price}}">
                        <span class="input-group-text">.00</span>
                        @error('price')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="stock" class="form-control-label">Stock</label>
                    <div class="input-group">
                        <input class="form-control @error('stock') is-invalid @enderror" type="number" min="0" id="stock" name="stock" value="{{$products->stock}}" placeholder="Masukkan stok produk">
                        <span class="input-group-text">pcs</span>
                    </div>
                    @error('stock')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="weight" class="form-control-label">Weight</label>
                    <div class="input-group">
                        <input class="form-control @error('weight') is-invalid @enderror" type="number" min="0" id="weight" name="weight" value="{{$products->weight}}" placeholder="Masukkan berat produk">
                        <span class="input-group-text">kg</span>
                    </div>
                    @error('weight')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div> -->
                <div class="form-group mb-3 mt-3">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Masukkan deskripsi produk" id="description" name="description" rows="3">{{$products->description}}</textarea>
                    @error('description')
                    <div class="alert alert-danger invalid-feedback" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="" for="image_name">Add Image</label>
                    <div class="input-group mb-3 mt-2">
                        <input class="form-control @error('image_name') is-invalid @enderror" id="image_name" name="image_name[]" type="file" value="" multiple>
                        @error('image_name')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="text-center pt-3">
                    <button type="submit" name="action" value="submit" class="btn btn-primary btn">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row mt-3">
        <div class="p-5 pt-0">
            <label>Product Image</label>
            <div class="table-responsive">
                <table class="table table-striped align-items-center mb-0">
                    <thead>
                        <tr class="text-center">
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($product_images as $product_image)
                        <div class="thumbnail">
                            <tr class="text-center">
                                <td>
                                    <h6 class="mb-0 text-xs">{{ $loop->index+1}}</h6>
                                </td>
                                <td>
                                    <img src="{{ asset('storage/'.$product_image->image_name) }}" alt="" style="width:100px; height:100px;">
                                </td>
                                <td>
                                    <form action="{{ route('product-image-delete', $product_image->id)  }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" name="action" value="delete-image" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                            <i class="bi bi-trash3"></i>
                                            <span> Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </div>
                        @empty
                        <div class="thumbnail">
                            <tr class="text-center">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <br>
            <!-- @if(empty($discount))
            <div class="table-responsive">
                <table class="table table-striped align-items-center mb-0">
                    <label class="" for="discount">Product Discount</label>
                    <thead>
                        <tr class="text-center">
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $discount)
                        <tr class="text-center">
                            <td>
                                <div>
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-xs">{{ $loop->index+1+($discounts->currentPage()-1)*5 }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold mb-0">{{ $discount->start }}</span>
                            </td>
                            <td>
                                <span class="text-dark text-xs">{{ $discount->end }}</span>
                            </td>
                            <td>
                                <span class="text-dark text-xs">{{ $discount->percentage }}%</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    {{ $discounts->links() }}
                </table>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-striped align-items-center mb-0">
                    <label class="" for="discount">Product Discount</label>
                    <thead>
                        <tr class="text-center">
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                                <div>
                                    <div class="my-auto">
                                        <h6 class="mb-0 text-xs">-</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-xs font-weight-bold mb-0">-</span>
                            </td>
                            <td>
                                <span class="text-dark text-xs">-</span>
                            </td>
                            <td>
                                <span class="text-dark text-xs">-</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endif -->
        </div>
    </div>
</div>
@endsection