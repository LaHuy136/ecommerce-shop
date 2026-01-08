<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);

        $total    = array_sum(
            array_map(
                fn($i) => $i['price'] * $i['quantity'],
                $cart
            )
        );
        return view('frontend.carts.cart', [
            'cart' => $cart,
            'total' => '$' . $total
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->product_id;

        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ]);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->images->first()->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        $totalQty = array_sum(
            array_column(
                $cart,
                'quantity'
            )
        );

        return response()->json([
            'message' => 'Product added to cart successfully',
            'cart' => $cart,
            'totalQty' => $totalQty
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $action = $request->action;
        $message = 'Cart updated successfully';
        $cart = session()->get('cart', []);

        if (!isset($cart[$id])) {
            return response()->json([
                'message' => 'Product not found in cart'
            ]);
        }

        if ($action === 'increment') {
            $cart[$id]['quantity']++;
        }

        if ($action === 'decrement') {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                $message = 'Quantity cannot be less than 1';
            }
        }

        if ($action === 'delete') {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        $itemQty   = $cart[$id]['quantity'] ?? 0;
        $itemTotal = ($cart[$id]['price'] ?? 0) * $itemQty;

        $totalQty = array_sum(
            array_column(
                $cart,
                'quantity'
            )
        );
        $total    = array_sum(
            array_map(
                fn($i) => $i['price'] * $i['quantity'],
                $cart
            )
        );

        return response()->json([
            'message' => $message,
            'itemQty'   => $itemQty,
            'itemTotal' => '$' . $itemTotal,
            'totalQty'  => $totalQty,
            'total'     => '$' . $total,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
