@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">New Product</h6>
            <p class="text-sm mb-0">Create a new product with the details below.</p>
            <hr class="horizontal dark my-3">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" name="quantity" class="form-control">
                    </div>
                </div>
                <div class="input-group input-group-outline my-3">
                    <textarea class="form-control" name="description" rows="5" placeholder="A short bio about yourself..."></textarea>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Create Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
