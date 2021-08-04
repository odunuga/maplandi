<?php


namespace Modules\Shop\Traits;


use Modules\Shop\Entities\Product;

trait RatingTraits
{

    public function implement_rating(array $value)
    {
        $filter_product_id = (int)trim(substr($value['id'], -1, 1));
        $filter_rating_value = (float)trim($value['value']);
        if (auth()->check()) {
            $deal = Product::where('id', $filter_product_id)->firstOrFail();
            auth()->user()->rate($deal, $filter_rating_value);
            $this->emit('alert', ['success', 'Rating Saved']);
        } else {
            $this->emit('alert', ['error', 'You Are Not logged In']);
        }
    }
}
