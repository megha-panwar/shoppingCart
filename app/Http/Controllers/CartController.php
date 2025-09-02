<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cart->sum(fn($i) => $i->product->price * $i->quantity);

        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = max(1, (int) $request->input('quantity', 1));

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->quantity += $quantity;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart.');
    }

public function update(Request $request, $id)
{
    $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

    if (! $cart) {
        return redirect()->route('cart.index')->with('error', 'Product not found in cart.');
    }

    $product = \App\Models\Product::find($id);
    if (! $product) {
        return redirect()->route('cart.index')->with('error', 'Product not found.');
    }

    if ($request->has('action')) {
        if ($request->action === 'increase') {
            if ($cart->quantity < $product->quantity) {
                $cart->quantity += 1;
            } else {
                return redirect()->route('cart.index')
                    ->with('error', 'Only ' . $product->quantity . ' items available in stock.');
            }
        } elseif ($request->action === 'decrease') {
            $cart->quantity -= 1;
            if ($cart->quantity <= 0) {
                $cart->delete();
                return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
            }
        }
    } else {
        $quantity = (int) $request->input('quantity', 0);
        if ($quantity <= 0) {
            $cart->delete();
            return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
        }

        if ($quantity > $product->quantity) {
            return redirect()->route('cart.index')
                ->with('error', 'Only ' . $product->quantity . ' items available in stock.');
        }

        $cart->quantity = $quantity;
    }

    $cart->save();
    return redirect()->route('cart.index')->with('success', 'Cart updated.');
}


    public function remove($id)
    {
        Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();
        return redirect()->route('cart.index')->with('success', 'Cart cleared.');
    }
}

