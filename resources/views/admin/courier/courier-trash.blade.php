@extends('admin.layout-dashboard')

@section('title', 'BicyShop | List Trash Courier')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST TRASH COURIER</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" class="btn btn-danger btn-sm" href="{{ route('courier') }}">Back</a>
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
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Courier</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($couriers as $courier)
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs">{{ $loop->index+1 }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $courier->courier }}</span>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('courier-delete-permanently', $courier->id)  }}" method="POST">
                            @csrf
                            <a type="button" class="btn btn-primary" href="{{ route('courier-restore', $courier->id) }}">
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