@extends('landing_page')

@section('content')
    <div class="row mt-5">
        @if (isset($listProducts) && $listProducts->count() > 0)
        @foreach ($listProducts as $product)
            <div class="col-lg-4 col-md-6 mb-4 product-item" id="product-{{ $product->id }}">
                <div class="card">
                    <img src="{{ asset($product->photo_link) }}" class="card-img-top" alt="{{ $product->name }}" />
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-white">{{ $product->name }}</h5>
                        <p class="card-text text-white flex-grow-1">
                            {{ $product->description ?? 'No description available.' }}
                        </p>
                        <h5 class="card-text text-white" style="font-weight: bold;">Rp. {{ $product->price }}</h5>
                        <div class="d-flex justify-content-between">
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-danger delete-btn" data-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @else
            <p class="text-center">No products found</p>
        @endif
    </div>

    <!-- Floating Button -->
    <a href="" class="floating-btn" title="Add New Item" data-bs-toggle="modal" data-bs-target="#addModal">
        +
    </a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @include('delete_modal')
    @include('add_modal')
    @include('edit_modal')
@endsection
