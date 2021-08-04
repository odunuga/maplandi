<?php


namespace Modules\Shop\Traits;


use App\Models\User;
use Modules\Shop\Entities\Product;

trait RatingTraits
{

    public function implement_rating(array $value)
    {
        $fetch_id = substr($value['id'], 4);
        $filter_product_id = (int)$fetch_id;
        $filter_rating_value = (float)trim($value['value']);
        if (auth()->check()) {
            $item_check = Product::where('id', $filter_product_id);
            if ($item_check->count() > 0) {
                $item = $item_check->first();
                if (auth()->user()->hasRated($item)) {
                    auth()->user()->updateRatingFor($item, $filter_rating_value);
                } else {
                    auth()->user()->rate($item, $filter_rating_value);
                }

                $rating = $item->averageRating(User::class);
                $this->emit('alert', ['success', 'Rating Saved']);
                $this->emit('update_rating', ['id' => $filter_product_id, 'value' => $rating]);

            } else {
                $this->emit('alert', ['error', "Product Not Found"]);
            }

        } else {
            $this->emit('alert', ['error', 'You Are Not logged In']);
        }
    }
}
