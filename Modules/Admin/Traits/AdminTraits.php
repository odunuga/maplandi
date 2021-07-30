<?php


namespace Modules\Admin\Traits;


use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Product;

trait AdminTraits
{



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

