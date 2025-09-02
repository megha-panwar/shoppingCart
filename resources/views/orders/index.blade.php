@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Your Orders</h1>

    @if($orders->isEmpty())
        <div class="alert alert-info">You have no orders yet.</div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>₹ {{ number_format($order->total, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">
                            View Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
