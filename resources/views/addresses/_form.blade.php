@php
    $a = $address ?? null;
@endphp

<form action="{{ $action }}" method="POST">
    @csrf
    @if(in_array($method, ['PUT','PATCH'])) @method($method) @endif

    <div class="mb-3">
        <label class="form-label">Full name</label>
        <input name="full_name" value="{{ old('full_name', $a->full_name ?? '') }}" class="form-control" required>
        @error('full_name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control" rows="3" required>{{ old('address', $a->address ?? '') }}</textarea>
        @error('address') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">City</label>
            <input name="city" value="{{ old('city', $a->city ?? '') }}" class="form-control" required>
            @error('city') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="col mb-3">
            <label class="form-label">Postal code</label>
            <input name="postal_code" value="{{ old('postal_code', $a->postal_code ?? '') }}" class="form-control" required>
            @error('postal_code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input name="phone" value="{{ old('phone', $a->phone ?? '') }}" class="form-control" required>
        @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_default" value="1" class="form-check-input" id="is_default"
            {{ old('is_default', optional($a)->is_default) ? 'checked' : '' }}>
        <label class="form-check-label" for="is_default">Set as default</label>
    </div>

    <button class="btn btn-primary" type="submit">Save address</button>
    <a href="{{ route('addresses.index') }}" class="btn btn-secondary">Cancel</a>
</form>
