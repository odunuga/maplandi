<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

    public function order()
    {
        if (auth()->check()) {
            return view('cart::order');
        }
        session()->put('redirect_to', 'order');
        return redirect()->route('login');
    }

    public function order_show($ref)
    {
        if (auth()->check()) {
            return view('cart::order_show');
        }
        session()->put('redirect_to', 'order');
        return redirect()->route('login');

    }
}
