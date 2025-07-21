@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Order</h6>
                                <a class="btn btn-outline-white btn-sm mb-1 me-3" href="{{ route('order.create') }}">
                                    Add Order
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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            quantity</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Total</th>
                                        <th class="text-secondary opacity-7"> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($Orders as $order)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $order->product->name }}</h6>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $order->quantity }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ number_format($order->total, 0, ',', '.') }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-sm text-info mb-0 mt-0"
                                                    href="{{ route('order.show', $order->id) }}"
                                                    class="text-secondary font-weight-bold text-xs">
                                                    View
                                                </a>
                                                <br class="mt-0 mb-0">
                                                <a class="btn btn-sm text-warning mb-0 mt-0"
                                                    href="{{ route('order.edit', $order->id) }}"
                                                    class="text-secondary font-weight-bold text-xs">
                                                    Edit
                                                </a>
                                                <form action="{{ route('order.destroy', $order->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm text-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                Order is not available
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
