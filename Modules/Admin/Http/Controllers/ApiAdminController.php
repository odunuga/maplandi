<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Product;

class ApiAdminController extends Controller
{
    public function get_latest_products()
    {
        $orders = Product::with(['image', 'currency', 'category', 'parameters'])->latest()->get()->map->admin_format();
        return response()->json(['orders' => $orders]);
    }

    public function get_orders()
    {
        $orders = Order::with('buyer')->latest()->get()->map->format_admin_orders();
        return response()->json(['orders' => $orders]);
    }

    public function get_stocks()
    {
        $stocks = Product::with(['parameters', 'image'])->latest()->get()->map->format_admin_stock();
        return response()->json(['stocks' => $stocks]);
    }


    public function get_users()
    {
        $users = User::with('shipping_address')->get();
        return response()->json(['users' => $users]);
    }

    public function get_transactions()
    {
        $trans = Order::with('buyer')->orderByDesc('id')->get()->map->format_transaction_record();
        return response()->json(['transactions' => $trans]);

    }
}
