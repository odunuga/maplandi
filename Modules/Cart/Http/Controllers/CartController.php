<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Order;
use Modules\Shop\Traits\CartTraits;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('cart::index');
    }

    public function checkout()
    {
        if (auth()->check()) {
            return view('cart::checkout');
        }
        // redirect back to this page on successful login
        session()->put('redirect_to', 'checkout');
        return redirect()->route('login');
    }

    public function orders()
    {
        if (auth()->check()) {
            $orders = Order::where('user_id', auth()->id())->latest()->get();
            return view('cart::orders')->with(['orders' => $orders]);
        }
        session()->put('redirect_to', 'order');
        return redirect()->route('login');
    }

    public function order_show($ref)
    {
        if (auth()->check()) {

            $order = Order::with(['buyer', 'cart'])->where('reference', $ref)->first();

            return view('cart::order_show')->with(['order' => $order]);
        }
        session()->put('redirect_to', 'order');
        return redirect()->route('login');

    }

    public function on_delivery()
    {
        return view('cart::order_confirmation');
    }
}
