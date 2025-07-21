@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">Update Order</h6>
            <p class="text-sm mb-0">Update Order with the details below.</p>
            <hr class="horizontal dark my-3">

            <form action="{{ route('order.update', $Order->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div
                            class="input-group input-group-outline my-3 {{ old('product_id', $Order->product_id) ? 'is-filled' : '' }}">
                            <select name="product_id" class="form-control">
                                <option value="">-- Select Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == old('product_id', $Order->product_id) ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="input-group input-group-outline my-3 {{ old('quantity', $Order->quantity) ? 'is-filled' : '' }}">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" step="0.01" min="0"
                                value="{{ old('quantity', $Order->quantity) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-gradient-dark w-100">Update Order</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
