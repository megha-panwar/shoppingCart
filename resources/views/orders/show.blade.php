@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Order #{{ $order->id }}</h1>

    <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    <p><strong>Total:</strong> ₹ {{ number_format($order->total, 2) }}</p>
    <p><strong>Address:</strong> {{ $order->address->full_name }}, {{ $order->address->address }}, {{ $order->address->city }} - {{ $order->address->postal_code }}</p>

    <h4 class="mt-4">Items</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹ {{ number_format($item->price, 2) }}</td>
                <td>₹ {{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Back to Orders</a>
</div>
@endsection
