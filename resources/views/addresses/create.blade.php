@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Address</h1>
    @include('addresses._form', ['action' => route('addresses.store'), 'method' => 'POST'])
</div>
@endsection
