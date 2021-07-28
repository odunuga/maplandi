<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\AdminTraits;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Parameter;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductParameter;

class AdminController extends Controller
{
    use SiteSettingsTraits;

    public function __construct()
    {
        $this->middleware('auth:admin_web')->except('showLogin');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $menu = $this->get_dashboard_menu();
        return view('admin::index')->with(['menu' => $menu]);
    }

    public function orders()
    {
        return view('admin::orders');
    }

    public function stocks()
    {
        return view('admin::stocks');
    }

    public function users()
    {
        return view('admin::users.index');
    }

    public function settings()
    {
        return view('admin::settings');
    }

    public function settings_edit()
    {
        $currencies = Currency::all();
        return view('admin::settings_edit')->with(['currencies' => $currencies]);
    }

    public function settings_update()
    {
        $settings = request()->all();
        $this->update_site_settings($settings);
        return view('admin::settings')->with(['success' => 'Update Successful']);
    }

    public function order_show(Order $order)
    {
        return view('admin::single_order')->with(['order' => $order]);
    }

    public function update_order()
    {
        if (request()->has('id')) {
            $id = (int)request()->get('id');
            $confirm_transaction = custom_filter_var(request()->get('confirm_transaction'));
            $delivery_status = custom_filter_var(request()->get('delivery_status'));
            $order = Order::where('id', $id)->firstOrFail();
            if ($confirm_transaction) {
                $order->transaction_confirmed = $confirm_transaction == "on" ? true : false;
                if ($confirm_transaction == "on" && $order->paid_at == null) {
                    $order->paid_at = now();
                }
                $order->delivery_status = (int)$delivery_status;
                $order->update();
                return back()->with(['success' => 'Update Successful']);
            }
        }
    }


    public function transactions()
    {
        return view('admin::transactions');
    }

    public function print_page($ref)
    {
        if ($ref) {
            $order = Order::with('buyer')->where('reference', $ref)->firstOrFail();
            return view('admin::pdf.order_print')->with(['order' => $order]);
        }

    }


    private function get_dashboard_menu()
    {
        $total_products = Product::count();
        $in_stock = Product::all()->sum('stock');
        $orders = $orders = Order::all();
        $sold_items = $this->sum_all_order_products($orders);
        $total_cost = $this->sum_all_amount($orders);

        return compact('total_products', 'in_stock', 'sold_items', 'total_cost');
    }

    private function sum_all_amount($orders)
    {
        $currency = get_user_currency();
        $orders->where('status', 1);
        $sum = 0.0;
        foreach ($orders as $order) {
            $amount = (float)$order->amount;
            $sum += set_amount($currency['code'], $amount);
        }
        return currency_with_price($sum, $currency['code']);
    }

    private function sum_all_order_products($orders)
    {
        $sum = 0;

        foreach ($orders as $order) {
            $sum += count($order['cart']);
        }
        return $sum;
    }


}
