<?php


namespace Modules\Shop\Traits;


use Darryldecode\Cart\Cart;

trait CartTraits
{
    private $session_id;

    public function __construct()
    {
        $this->session_id = session()->getId();
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
        return \Cart::session($this->session_id)->add($item);

    }

    protected function check_cart_item($itemId)
    {
        return \Cart::session($this->session_id)->get($itemId) != null;
    }

    public function update_cart($rowId, array $item)
    {
//
//        Cart::update(456, array(
//            'name' => 'New Item Name', // new item name
//            'price' => 98.67, // new item price, price can also be a string format like so: '98.67'
//        ));
        return \Cart::session($this->session_id)->update($rowId, $item);
    }

    public function delete_cart($rowId)
    {
        return \Cart::session($this->session_id)->remove($rowId);
    }


    public function get_single_item($itemId)
    {
        return \Cart::session($this->session_id)->get($itemId);
    }

    public function get_all_items()
    {
        return \Cart::session($this->session_id)->getContent();
    }

    public function cart_count()
    {
        // count carts contents
        $cartCollection = $this->get_all_items();
        return $cartCollection->count();
    }

}
