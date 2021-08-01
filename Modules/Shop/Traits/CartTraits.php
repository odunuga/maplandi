<?php


namespace Modules\Shop\Traits;


use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Http\Livewire\Cart;
use Carbon\Carbon;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Cache;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Cart\Entities\CartRecord;
use Modules\Cart\Entities\SavedItem;
use Modules\Shop\Entities\Promotion;

trait CartTraits
{
    use SiteSettingsTraits;


    public function session_id()
    {
        return session()->getId();
    }

    public function add_cart($item)
    {
//        Cart::add(array(
//            'id' => 456, // inique row ID
//            'name' => 'Sample Item',
//            'price' => 67.99,
//            'quantity' => 4,
//            'attributes' => ['symbol'=>$item->attribute->symbol,'category'=>$item->attribute->symbol]
//        ));
        return \Cart::session($this->session_id())->add($item);

    }

    protected function check_cart_item($itemId)
    {
        return \Cart::session($this->session_id())->get($itemId) != null;
    }

    private function update_cart($rowId, array $item)
    {
//
//        Cart::update(456, array(
//            'name' => 'New Item Name', // new item name
//            'price' => 98.67, // new item price, price can also be a string format like so: '98.67'
//        ));
        return \Cart::session($this->session_id())->update($rowId, $item);
    }

    private function delete_cart($rowId)
    {
        return \Cart::session($this->session_id())->remove($rowId);
    }


    private function get_single_item($itemId)
    {
        return \Cart::session($this->session_id())->get($itemId);
    }

    private function get_all_items()
    {
        return \Cart::session($this->session_id())->getContent();
    }


    public function cart_count()
    {
        // count carts contents
        $cartCollection = $this->get_all_items();
        return $cartCollection->count();
    }

    private function set_amount($code, $amount, $currency = null)
    {
        if ($currency === null) $currency = get_user_currency()['code'];
        return Currency::convert()->from($code)->to($currency)->amount($amount)->get();
    }

    private function get_admin_base_currency_code()
    {
        return $this->get_admin_base_currency()->code;
    }

    private function get_admin_base_currency()
    {
        return $this->get_site_settings()->currency;
    }


    private function check_session_cart()
    {
        if (auth()->check()) {
            return \Modules\Shop\Entities\Cart::where('user_id', auth()->id())->latest();
        }
        return CartRecord::where('session_id', $this->session_id());
    }

    private function get_session_cart($session)
    {
        return CartRecord::where('session_id', $session);
    }

    private function clear_session_cart($session)
    {
        $check = CartRecord::where('session_id', $session);
        if ($check->count() > 0) {
            $check->delete();
        }
    }

    private function clear_all_cart($session)
    {
        \Cart::session($this->session_id())->clear();
    }

    private function fetch_cart()
    {
        // check previous session cart
        if (Cache::has('prev_session')) {
            $session = Cache::get('prev_session');
            $cart_check = $this->get_session_cart($session);
            if ($cart_check->count() > 0) {
                $this->clear_session_cart($session);
                return $cart_check->first();
            }
        }
        return null;
    }

    private function move_previous_session_cart($session_id)
    {
        $cart_record = CartRecord::where('session_id', $session_id);
        if ($cart_record->count() > 0) {
            $stored = $cart_record->first();
            $new_cart = \Modules\Shop\Entities\Cart::create([
                'user_id' => auth()->id(),
                'session_id' => $this->session_id(),
                'cart' => $stored->cart,
                'sub_total' => $stored->sub_total,
                'payment_currency' => $stored->payment_currency,
                'payment_symbol' => $stored->payment_symbol,
                'tax_added' => $stored->tax_added,
                'total' => $stored->total,
            ]);
            $cart_record->delete();
            return $new_cart;
        }
    }

    private function get_cart($session)
    {
        return \Modules\Shop\Entities\Cart::where('user_id', auth()->id())->where('session_id', $session)->first();
    }

    /**
     * @param $session_id
     * @param $cart
     * @param $payment_id
     * @param $payment_symbol
     * @return mixed
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    private function store_cart_in_db($session_id, $cart, $payment_id, $payment_symbol)
    {
        $sub_total = \Cart::session($this->session_id())->getSubTotal();

        $tax = $this->get_site_settings() && $this->get_site_settings()->tax ? $this->get_site_settings()->tax : 0;
        $tax_added = $this->sub_total * ($tax / 100);

        // get cart conditions
        $total = \Cart::session($this->session_id())->getTotal();

        $check_exist = CartRecord::where('session_id', $session_id);
        if ($check_exist->count() > 0) {
            $cart = $check_exist->first();
            $cart->update([
                'cart' => $this->add_converted_currency($this->get_all_items()),
                'sub_total' => $sub_total,
                'payment_currency' => $payment_id,
                'payment_symbol' => $payment_symbol,
                'tax_added' => $tax_added,
                'total' => $total,

            ]);

            return $cart;
        } else {
            $cart = CartRecord::create([
                'session_id' => $session_id,
                'cart' => $this->add_converted_currency($this->get_all_items()),
                'sub_total' => $sub_total,
                'payment_currency' => $payment_id,
                'payment_symbol' => $payment_symbol,
                'tax_added' => $tax_added,
                'total' => $total,
            ]);
            return $cart;
        }


    }

    private function add_converted_currency($items, $code = null)
    {
        $new_record = [];
        foreach ($items as $item) {
            $new_record[] = ['id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'attributes' => [
                    'category' => $item['attributes']['category'],
                    'image' => $item['attributes']['image'],
                    'description' => $item['attributes']['description'],
                    'selling_symbol' => $item['attributes']['selling_symbol'],
                    'selling_code' => $item['attributes']['selling_code'],
                    'buying_code' => $item['attributes']['buying_code'],
                    'buying_symbol' => $item['attributes']['buying_symbol'],
                    'selling_price' => $item['attributes']['selling_price'],
                ]
            ];
        }
        return $new_record;
    }


    private function delete_from_saved($id)
    {
        return SavedItem::where('user_id', auth()->id())->where('product_id', $id)->delete();
    }

    private function add_to_saved($id)
    {
        $check = SavedItem::where('user_id', auth()->id())->where('product_id', $id);
        if ($check->count() < 1) {
            SavedItem::create([
                'user_id' => auth()->id(),
                'product_id' => $id
            ]);
            $this->delete_cart($id);
        }
    }

    private function get_cart_conditions()
    {
        return \Cart::session($this->session_id())->getConditions();
    }

    /**
     * @param $id
     * @return array
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     *
     */
    private function get_item_condition($id)
    {
        $now = Carbon::now();
        $condition = [];
        $check_conditions = Promotion::where('condition', 1)->whereDate('start_date', '<', $now)->whereDate('end_date', '>', $now);
        if ($check_conditions->count() > 0) {
            $conditions = $check_conditions->get();
            foreach ($conditions as $each) {
                $products = collect($each->products);
                if ($products->contains((int)$id)) {
                    $condition[] = new CartCondition([
                        'name' => $each->title,
                        'type' => 'promo',
                        'value' => '-' . $each->rate,
                    ]);
                }
            }
        }
        // check all promotion if there is any that is for product base
        return $condition;
    }

    /**
     * @param void
     * @return array
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     *
     */
    private function get_cart_condition()
    {
        $now = Carbon::now();
        $condition = [];
        $check_conditions = Promotion::where('condition', 0)->whereDate('start_date', '<', $now)->whereDate('end_date', '>', $now)->orWhere('continuous', 0);
        if ($check_conditions->count() > 0) {
            $conditions = $check_conditions->get();
            foreach ($conditions as $each) {
                $condition[] = new CartCondition([
                    'name' => $each->title,
                    'type' => 'promo',
                    'value' => '-' . $each->rate,
                    'target' => 'subtotal'
                ]);

            }
        }
        // check all promotion if there is any that is for product base
        return $condition;
    }

    /**
     * @param $tax
     * @throws \Darryldecode\Cart\Exceptions\InvalidConditionException
     */
    private function create_tax_condition($tax)
    {
        return new  CartCondition(array(
            'name' => 'TAX ' . $tax . '%',
            'type' => 'tax',
            'target' => 'subtotal',
            'value' => '+' . $tax . '%',
        ));
    }

    private function set_tax_condition($tax)
    {
        \Cart::session($this->session_id())->condition($tax);
    }
}
