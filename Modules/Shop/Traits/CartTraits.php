<?php


namespace Modules\Shop\Traits;


use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Http\Livewire\Cart;
use Illuminate\Support\Facades\Cache;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Cart\Entities\CartRecord;

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
        return CartRecord::where('session_id', $session)->delete();
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
}
