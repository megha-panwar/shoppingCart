@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Checkout</h1>

    <h4>Your Addresses</h4>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <select name="address_id" class="form-control" required>
                @foreach($addresses as $address)
                    <option value="{{ $address->id }}">
                        {{ $address->full_name }}, {{ $address->address }}, {{ $address->city }} ({{ $address->postal_code }})
                    </option>
                @endforeach
            </select>
        </div>

        <h4>Your Cart</h4>
        <ul>
            @foreach($cart as $item)
                <li>
                    {{ $item->product->name }} (x{{ $item->quantity }}) -
                    ₹ {{ number_format($item->product->price * $item->quantity, 2) }}
                </li>
            @endforeach
        </ul>

        <button type="submit" class="btn btn-success mt-3">Place Order</button>
    </form>
</div>
@endsection
