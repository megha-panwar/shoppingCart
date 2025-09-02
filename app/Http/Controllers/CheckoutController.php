<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $addresses = auth()->user()->addresses;

        return view('checkout.index', compact('cart', 'addresses'));
    }

    public function store(Request $request)
    {
        $cart = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        if ($cart->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $data = $request->validate([
            'address_id' => 'required|exists:addresses,id'
        ]);

        DB::transaction(function () use ($cart, $data) {
            $total = $cart->sum(fn($i) => $i->product->price * $i->quantity);

            $order = Order::create([
                'user_id'    => auth()->id(),
                'address_id' => $data['address_id'],
                'total'      => $total,
                'status'     => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);
            }

            Cart::where('user_id', auth()->id())->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Your order has been placed!');
    }





    public function orders()
{
    $orders = auth()->user()->orders()->with('items.product', 'address')->latest()->get();

    return view('orders.index', compact('orders'));
}

public function showOrder(Order $order)
{
    if ($order->user_id !== auth()->id()) {
        abort(403, 'Unauthorized action.');
    }

    $order->load('items.product', 'address');

    return view('orders.show', compact('order'));
}

}
