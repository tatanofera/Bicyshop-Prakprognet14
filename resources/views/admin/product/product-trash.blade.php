@extends('admin.layout-dashboard')

@section('title', 'BicyShop | List Trash Product')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH PRODUCT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product') }}">Back</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="p-3 pt-0">
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped align-items-center mb-0 mx-2 my-2">
            <thead>
                <tr class="text-center">
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product Name</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Weight</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs">{{ $loop->index+1 }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $product->product_name }}</span>
                    </td>
                    <td>
                        <span class="text-dark text-xs">Rp.{{ $product->price }}</span>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $product->stock }} pcs</p>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $product->weight }} kg</span>
                    </td>
                    <td>
                        <span class="text-dark text-xs">{{ $product->description }}</span>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('product-delete-permanently', $product->id)  }}" method="POST">
                            @csrf
                            <!-- <a type="button" class="btn btn-success" href="{{ route('product-detail', $product->id) }}">
                                <i class="bi bi-box-arrow-right"></i>
                            </a> -->
                            <a type="button" class="btn btn-primary" href="{{ route('product-restore', $product->id) }}">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span> Restore</span>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection