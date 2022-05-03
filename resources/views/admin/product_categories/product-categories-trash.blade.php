@extends('admin.layout-dashboard')

@section('title', 'BicyShop | List Trash Categories')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH CATEGORIES</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('product-categories') }}">Back</a>
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
                <tr>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_categories as $product_category)
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs">{{ $loop->index+1}}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $product_category->category_name }}</span>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('product-categories-delete-permanently', $product_category->id)  }}" method="POST">
                            @csrf
                            <a type="button" class="btn btn-primary" href="{{ route('product-categories-restore', $product_category->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-backspace"></i>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection