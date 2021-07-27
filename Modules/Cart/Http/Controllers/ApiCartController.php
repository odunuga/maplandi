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
        $orders = Order::where('user_id', auth()->id())->latest()->get()->map->formatUsers();
        return response()->json(['data' => $orders]);
    }
}
