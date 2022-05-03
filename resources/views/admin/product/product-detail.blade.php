@extends('admin.layout-dashboard')

@section('title', 'BicyShop | Detail Product')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">DETAIL PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="container mb-2 mt-4">
        <div class="row p-5 ps-3 pt-0 pb-0 mb-0">
            <div class="col-4 mt-4">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        @foreach($product_images as $key => $slider)
                        @if($key >0)
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{$key}}" aria-label="Slide {{$key}}"></button>
                        @endif
                        @endforeach
                        <!-- <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li> -->
                    </div>
                    <div class="carousel-inner">
                        @foreach($product_images as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$slider->image_name) }}" class="img-fluid shadow border-radius-lg" style="width: 400px; height: 400px;" alt="...">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <!-- <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> -->
                </div>
                <!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach($product_images as $key => $slider)
                        <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/'.$slider->image_name) }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg" style="width:auto height fit-content">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"> </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div> -->
                <h6 class="text-center bold">Image Product : {{$products->product_name}}</h6>
                <!-- @forelse($product_images as $product_image)
                <div class="row">
                    <form action="{{ route('product-image-delete', $product_image->id)  }}" method="POST">
                        @csrf
                        <div class="thumbnail">
                            <img class="img-fluid-left img-thumbnail" src="{{ asset('storage/'.$product_image->image_name) }}" alt="" style="width:100%; height:100%;">
                        </div>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                            <i class="bi bi-backspace"></i>
                    </form>
                </div>
                @empty
                <div class="col-6 align-items-center">
                    <h3 class="mb-0">Tidak Ada Foto</h3>
                </div>
                @endforelse -->
            </div>
            <div class="col-8 mb-5">
                <label for="product_name" class="form-control-label">Product Name</label>
                <input class="form-control" type="text" value="{{$products->product_name}}" id="product_name" name="product_name" readonly>
                <div class="col">
                    <label for="category_id" class="form-control-label">Category</label>
                    <input class="form-control" type="text" value="{{$det_categories->Product_categories->category_name}}" rows="3" id="category_id" name="category_id" readonly>
                </div>
                <div class="row">
                    <div class="">
                        <label for="price" class="form-control-label">Price</label>
                        <input class="form-control" type="number" value="{{$products->price}}" id="price" name="price" readonly>
                    </div>
                </div>
                <div class="col">
                    <label for="description" class="form-control-label">Description</label>
                    <input class="form-control" type="text" value="{{$products->description}}" rows="3" id="description" name="description" readonly>
                </div>
                <div class="col">
                    <label for="stock" class="form-control-label">Stock</label>
                    <input class="form-control" type="text" value="{{$products->stock}} pcs" id="stock" name="stock" readonly>
                </div>
                <div class="col">
                    <label for="weight" class="form-control-label">Weight</label>
                    <input class="form-control" type="text" value="{{$products->weight}} kg" id="weight" name="weight" readonly>
                </div>
            </div>
        </div>
        @if(empty($discount))
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
        @endif
        <br><br>
    </div>
</div>
@endsection