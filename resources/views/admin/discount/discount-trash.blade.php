@extends('admin.layout-dashboard')

@section('title', 'BicyShop | List Trash Discount')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH DISCOUNT</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('discount') }}">Back</a>
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
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Product</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentage</th>
                    <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discounts as $discount)
                <?php
                $products = App\Models\Product::onlyTrashed()->where('id', '=', $discount->product_id)->get();
                $product = App\Models\Product::onlyTrashed()->where('id', '=', $discount->product_id)->first();
                $product_count = $products->count();
                ?>
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs">{{ $loop->index+1 }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $discount->start }}</span>
                    </td>
                    <td>
                        <span class="text-dark text-xs">{{ $discount->end }}</span>
                    </td>
                    @if(!empty($product_count))
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $product->product_name }}</span>
                    </td>
                    @else
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $discount->Product->product_name }}</span>
                    </td>
                    @endif
                    <td>
                        <span class="text-dark text-xs">{{ $discount->percentage }}%</span>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('discount-delete-permanently', $discount->id)  }}" method="POST">
                            @csrf
                            @if(empty($product_count))
                            <a type="button" class="btn btn-primary" href="{{ route('discount-restore', $discount->id) }}">
                                <i class="bi bi-arrow-counterclockwise"></i>
                                <span> Restore</span>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                            </button>
                            @else
                            <button type="button" class="btn btn-warning">
                                <i class="bi bi-info-circle"></i>
                                <span> Restore Product</span>
                            </button>
                            @endif
                            <!-- <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-trash3"></i>
                                <span> Delete</span>
                            </button> -->
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection