@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-5 text-center fw-bold">Product Catalog ({{ $products->count() }})</h1>

    @if($products->isEmpty())
        <div class="alert alert-info text-center">No products found.</div>
    @else
        <div class="row g-4">
            @foreach($products as $product)
                <div class="col-4 d-flex"> {{-- Always 3 per row --}}
                    <div class="p-4 text-center w-100 shadow-sm bg-white rounded-3">
                        
                        {{-- Product Image --}}
                        {{-- Product Image Container --}}
                        <div class="d-flex align-items-center justify-content-center mb-4" 
                            style="height: 220px; background:#f8f9fa; overflow:hidden; border-radius:10px;">
                            <img 
                                src="{{ $product->image_url ?: 'https://via.placeholder.com/300x300?text=No+Image' }}" 
                                alt="{{ $product->name ?? 'No Name' }}" 
                                style="max-height: 100% !important; max-width: 100%; object-fit: contain;"
                            >
                        </div>

                        {{-- Product Title --}}
                        <h5 class="fw-semibold mb-2">{{ $product->name }}</h5>

                        {{-- Product Description --}}
                        <p class="text-muted small mb-3">
                            {{ \Illuminate\Support\Str::limit($product->description ?? '---', 80) }}
                        </p>

                        {{-- Price (Old + New) --}}
                        <div class="mb-3">
                            <span class="text-decoration-line-through text-muted me-2">
                                ₹{{ number_format($product->price + 500, 2) }}
                            </span>
                            <span class="fw-bold text-dark fs-5">
                                ₹{{ number_format($product->price, 2) }}
                            </span>
                        </div>

                        {{-- Buy Button --}}
<form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-dark px-4 py-2 fw-semibold rounded-3">
        Add To Cart
    </button>
</form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
