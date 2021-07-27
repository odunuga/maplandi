<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Order;

class ApiCartController extends Controller
{


    public function orders()
    {
        return response()->json(auth()->check());

        $orders = Order::where('user_id', auth()->id())->get();
        return response()->json(['data' => $orders]);
    }
}
