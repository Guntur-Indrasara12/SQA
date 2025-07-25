@extends('layout.app')

@section('content')
    <div class="container-fluid py-2">
        <div class="card card-body px-5">
            <h6 class="mb-0">Log Detail</h6>
            <p class="text-sm mb-0">Detailed information about this Log.</p>
            <hr class="horizontal dark my-3">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="text-sm text-secondary">Name</label>
                    <p class="text-lg font-weight-bold mb-0">{{ $Log->log_name }}</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="text-sm text-secondary">Description</label>
                    <p class="text-lg font-weight-bold mb-0">{{ $Log->description }}</p>
                </div>
                <div class="col-md-12 mb-3">
                    <label class="text-sm text-secondary">Properties</label>
                    <p class="text-md text-dark mb-0">{!! nl2br(e($Log->properties)) !!}</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 d-flex justify-content-between">
                    <a href="{{ route('Log.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
@endsection
