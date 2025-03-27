@extends('landing_page')

@section('content')
    <div class="row mt-5">
        @if (isset($listProducts) && $listProducts->count() > 0)
            @foreach ($listProducts as $product)
                <div class="col-lg-4 col-md-6 mb-4" id="product-{{ $product->id }}">
                    <div class="card">
                        <img src="{{ asset($product->photo_link) }}" class="card-img-top" alt="{{ $product->name }}" />
                        <div class="card-body">
                            <h5 class="card-title text-white">{{ $product->name }}</h5>
                            <p class="card-text text-white">
                                {{ $product->description ?? 'No description available.' }}
                            </p>
                            <div class="col">
                                <a href="" class="btn btn-primary">Edit</a>
                                <!-- Delete Button (Inside Product Loop) -->
                                <div class="col">
                                    <a href="#" class="btn btn-danger delete-btn" data-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
                                </div>                                
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
    <a href="" class="floating-btn" title="Add New Item">
        +
    </a>

    @include('delete_modal')
@endsection
