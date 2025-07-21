@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">

                {{-- Filter Form di pojok kanan --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-end">
                            <form method="GET" action="{{ route('product.index') }}" class="row">
                                <div class="col-auto">
                                    <div class="input-group input-group-outline mb-0">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" name="filter[name]" value="{{ request('filter.name') }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-auto d-flex align-items-center gap-2">
                                    <button type="submit" class="btn btn-dark btn-sm mt-2">Filter</button>
                                    <a href="{{ route('product.index') }}"
                                        class="btn btn-outline-secondary btn-sm mt-2">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Table Product --}}
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Product</h6>
                                <a class="btn btn-outline-white btn-sm mb-1 me-3" href="{{ route('product.create') }}">
                                    Add Product
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Quantity</th>
                                        <th class="text-secondary opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $product->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="max-width: 200px;">
                                                <p class="text-xs font-weight-bold mb-0 text-truncate"
                                                    style="max-width: 100%;">
                                                    {{ $product->description }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ number_format($product->price, 0, ',', '.') }}
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                    {{ $product->quantity }}
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-sm text-info mb-0 mt-0"
                                                    href="{{ route('product.show', $product->id) }}">View</a>
                                                <br class="mt-0 mb-0">
                                                <a class="btn btn-sm text-warning mb-0 mt-0"
                                                    href="{{ route('product.edit', $product->id) }}">Edit</a>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm text-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">
                                                Product is not available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 px-3 d-flex justify-content-end">
                            {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
