@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Address</h1>
    @include('addresses._form', ['action' => route('addresses.update', $address), 'method' => 'PUT', 'address' => $address])
</div>
@endsection
