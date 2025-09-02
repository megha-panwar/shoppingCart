<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $addresses = auth()->user()
            ->addresses()
            ->orderByDesc('is_default')
            ->get();

        return view('addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('addresses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'   => 'required|string|max:255',
            'address'     => 'required|string|max:1000',
            'city'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone'       => ['required','string','max:30'],
            'is_default'  => 'sometimes|boolean',
            // 'pin_code' => 'required'
        ]);

        // getting auth id
        $data['user_id'] = auth()->id();
        $data['is_default'] = $request->has('is_default') && $request->boolean('is_default');

        if ($data['is_default']) {
            auth()->user()->addresses()->update(['is_default' => false]);
        }

        Address::create($data);

        return redirect()->route('addresses.index')->with('success', 'Address saved.');
    }

    public function edit(Address $address)
    {
        abort_unless($address->user_id === auth()->id(), 403); // for check authenticate user can access only thier data
        return view('addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        abort_unless($address->user_id === auth()->id(), 403);

        $data = $request->validate([
            'full_name'   => 'required|string|max:255',
            'address'     => 'required|string|max:1000',
            'city'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone'       => ['required','string','max:30'],
            'is_default'  => 'sometimes|boolean',
        ]);

        $data['is_default'] = $request->has('is_default') && $request->boolean('is_default');

        if ($data['is_default']) {
            auth()->user()->addresses()->update(['is_default' => false]);
        }

        $address->update($data);

        return redirect()->route('addresses.index')->with('success', 'Address updated.');
    }

    public function destroy(Address $address)
    {
        abort_unless($address->user_id === auth()->id(), 403);

        $address->delete(); 

        if (auth()->user()->addresses()->where('is_default', true)->count() === 0) {
            $first = auth()->user()->addresses()->latest()->first();
            if ($first) {
                $first->update(['is_default' => true]);
            }
        }

        return redirect()->route('addresses.index')->with('success', 'Address deleted.');
    }

    public function setDefault(Address $address)
    {
        abort_unless($address->user_id === auth()->id(), 403);

        auth()->user()->addresses()->update(['is_default' => false]);

        $address->update(['is_default' => true]);

        return redirect()->route('addresses.index')->with('success', 'Default address set.');
    }
}