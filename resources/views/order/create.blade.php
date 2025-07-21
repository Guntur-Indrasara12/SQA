@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">New order</h6>
            <p class="text-sm mb-0">Create a new order with the details below.</p>
            <hr class="horizontal dark my-3">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        @include('components.select', [
                            'name' => 'product_id',
                            'label' => 'Product',
                            'options' => $products->pluck('name', 'id')->toArray(),
                            'required' => true,
                        ])
                    </div>

                    <div class="col-md-6">
                        @include('components.input', [
                            'name' => 'quantity',
                            'label' => 'Quantity',
                            'type' => 'number',
                            'step' => '0.01',
                            'min' => '0',
                            'required' => true,
                        ])
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn bg-gradient-dark w-100">Create Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
