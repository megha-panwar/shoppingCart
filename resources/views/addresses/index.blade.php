@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Addresses</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('addresses.create') }}" class="btn btn-primary mb-3">Add New Address</a>

    @forelse($addresses as $address)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $address->full_name }}
                    @if($address->is_default)
                        <span class="badge bg-success">Default</span>
                    @endif
                </h5>
                <p class="card-text">
                    {{ $address->address }}<br>
                    {{ $address->city }} - {{ $address->postal_code }}<br>
                    Phone: {{ $address->phone }}
                </p>

                <a href="{{ route('addresses.edit', $address) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                <form action="{{ route('addresses.destroy', $address) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this address?')">
                        Delete
                    </button>
                </form>

                @unless($address->is_default)
                    <form action="{{ route('addresses.default', $address) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">Set as default</button>
                    </form>
                @endunless
            </div>
        </div>
    @empty
        <div class="alert alert-info">You have no saved addresses.</div>
    @endforelse
</div>
@endsection
