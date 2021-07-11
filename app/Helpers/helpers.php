<?php


use Modules\Shop\Entities\Product;

function format_number($raw_num)
{

    $num = (int)str_replace(",", "", trim($raw_num));
    if ($num > 1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_arra = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;

        $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
    }

    return $num;
}

function filter_phone($value)
{
    $new_value = trim($value);
    $new_value = str_replace("(", "", $new_value);
    $new_value = str_replace(")", "", $new_value);
    $new_value = str_replace(" ", "", $new_value);
    return str_replace("-", "", $new_value);
}

function currency_with_price($value, $currency_symbol)
{
    $new_value = trim($value);
    $new_value = str_replace("(", "", $new_value);
    $new_value = str_replace(")", "", $new_value);
    $new_value = str_replace(" ", "", $new_value);
    $new_value = str_replace("-", "", $new_value);
    return $currency_symbol . ' ' . number_format($new_value);
}

function filtered_products($filters, $paginate)
{
    if ($filters && count($filters) > 0) {
        return filter_shop_products($filters, $paginate);
    }
    return Product::with(['image', 'tags', 'category', 'currency'])->latest()->where('published', 1)->where('available', 1)->paginate($paginate);
}

function filter_shop_products($filters, $paginate)
{
    $products = new Product();
    $filtered_products = $products::with(['image', 'tags', 'category', 'currency'])->where('published', 1)->where('available', 1);

    $filter = collect($filters);
    if ($filter->has('category')) {
        $cat = \Modules\Shop\Entities\Category::where('slug', $filter->get('category'))->first();
        if ($cat)
            $filtered_products = $filtered_products->where('category_id', $cat->id);
    }
    if ($filter->has('range')) {
        $filtered_products = $filtered_products->where('price', '<', $filter->get('range'));
    }
    if ($filter->has('order')) {
        $filtered_products = $filtered_products->orderByDesc('order');
    }
    return $filtered_products->paginate($paginate);
}

function get_categories()
{
    return \Modules\Shop\Entities\Category::with(['category', 'sub_categories', 'image', 'products' => function ($product) {
        $product->where('published', 1)->where('available', 1);
    }])->get();
}

function get_category_from_slug($slug)
{
    return \Modules\Shop\Entities\Category::where('slug', $slug)->first();
}
