@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">Update Product</h6>
            <p class="text-sm mb-0">Update product with the details below.</p>
            <hr class="horizontal dark my-3">

            <form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div
                            class="input-group input-group-outline my-3 {{ old('name', $product->name) ? 'is-filled' : '' }}">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $product->name) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="input-group input-group-outline my-3 {{ old('price', $product->price) ? 'is-filled' : '' }}">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0"
                                value="{{ old('price', $product->price) }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div
                        class="input-group input-group-outline my-3 {{ old('quantity', $product->quantity) ? 'is-filled' : '' }}">
                        <label class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control"
                            value="{{ old('quantity', $product->quantity) }}">
                    </div>
                </div>

                <div
                    class="input-group input-group-outline my-3 {{ old('description', $product->description) ? 'is-filled' : '' }}">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="5">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
