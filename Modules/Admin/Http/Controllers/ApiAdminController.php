<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Testimony;
use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Comment;
use Modules\Shop\Entities\CommentReport;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductReport;
use Modules\Shop\Entities\Promotion;
use Modules\Shop\Entities\Tag;

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
        $users = User::with('shipping_address')->get()->map->format_admin_users();
        return response()->json(['users' => $users]);
    }

    public function get_transactions()
    {
        $trans = Order::with('buyer')->orderByDesc('id')->get()->map->format_transaction_record();
        return response()->json(['transactions' => $trans]);
    }

    public function dropzone_update()
    {
        return response()->json([]);
    }

    public function get_tags()
    {
        $tags = Tag::latest()->get();
        return response()->json(['tags' => $tags]);

    }

    public function comment_report()
    {
        $reports = CommentReport::with(['reporter', 'message'])->latest()->get()
            ->map->format_comment_report();
        return response()->json(['comments' => $reports]);
    }

    public function get_product_report()
    {
        $reports = ProductReport::with(['reporter', 'product'])->latest()->get()->map->format_product_report();
        return response()->json(['products' => $reports]);
    }

    public function get_comments()
    {
        $comments = Comment::with('comment_by')->latest()->get()->map->format_admin_comments();
        return response()->json(['comments' => $comments]);
    }


    public function get_promotions()
    {
        $adverts = Promotion::with('image')->latest()->get()->map->format_admin_promotion();
        return response()->json(['promotions' => $adverts]);
    }

    public function get_testimonies(){
        $tests = Testimony::with('image')->latest()->get()->map->format_admin_testimony();
        return response()->json(['tests' => $tests]);
    }
}
