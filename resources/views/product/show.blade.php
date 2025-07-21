@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">Product Detail</h6>
            <p class="text-sm mb-0">Detailed information about this product.</p>
            <hr class="horizontal dark my-3">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-sm text-secondary">Name</label>
                    <p class="text-lg font-weight-bold mb-0">{{ $product->name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-sm text-secondary">Price</label>
                    <p class="text-lg font-weight-bold mb-0">${{ number_format($product->price, 2) }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-sm text-secondary">Quantity</label>
                    <p class="text-lg font-weight-bold mb-0">{{ $product->quantity }}</p>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="text-sm text-secondary">Description</label>
                    <p class="text-md text-dark mb-0">{!! nl2br(e($product->description)) !!}</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-outline-dark">Edit Product</a>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
