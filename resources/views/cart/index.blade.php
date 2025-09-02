@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Your Cart ({{ $cart->sum('quantity') }})</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cart->isEmpty())
        <div class="alert alert-info">Your cart is empty.</div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $item->product->image_url }}" 
                                         alt="{{ $item->product->name }}" 
                                         style="height:60px; width:60px; object-fit:contain;" 
                                         class="me-3 border rounded">
                                    <div>
                                        <strong>{{ $item->product->name }}</strong><br>
                                        <small class="text-muted">
                                            Price: ₹ {{ number_format($item->product->price, 2) }} <br>
                                            Quantity: {{ $item->quantity }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center" style="width:150px;">
                                <form action="{{ route('cart.update', $item->product_id) }}" method="POST" class="d-flex justify-content-center align-items-center">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" name="action" value="decrease" class="btn btn-sm btn-outline-secondary">-</button>

                                    <input type="number" value="{{ $item->quantity }}" readonly class="form-control form-control-sm text-center mx-1" style="width:60px;" />

                                    <button type="submit" name="action" value="increase" class="btn btn-sm btn-outline-secondary">+</button>
                                </form>
                            </td>
                            <td class="text-end">₹ {{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td class="text-end">
                                <form action="{{ route('cart.remove', $item->product_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-outline-secondary">Clear Cart</button>
            </form>

            <div class="text-end">
                <h5>Total: ₹ {{ number_format($cart->sum(fn($i) => $i->product->price * $i->quantity), 2) }}</h5>
<form action="{{ route('cart.checkout') }}" method="GET">
    @csrf
    <button type="submit" class="btn btn-success mt-2">
        Proceed to Checkout
    </button>
</form>
            </div>
        </div>
    @endif
</div>
@endsection
