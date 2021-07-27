<?php


use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Support\Facades\Cache;
use Modules\Shop\Entities\Product;

function format_number($raw_num)
{

    $num = (double)str_replace(",", "", trim($raw_num));
    if ($num > 1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
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
    return str_replace(array("(", ")", " ", "-"), "", $new_value);
}

function currency_with_price($value = null, $currency_symbol = 'NGN')
{
    if ($value === null) {
        return $currency_symbol . '0';
    }
    $new_value = trim($value);
    $new_value = str_replace(array("(", ")", " "), "", $new_value);
    $new_value = (double)str_replace("-", "", $new_value);
    return $currency_symbol . ' ' . number_format($new_value);
}

function filtered_products($paginate, $category_id = null, $range = null, $search = null, $order = null, $dir = null)
{

    $products = new Product();

    $filtered_products = $products::with(['image', 'tags', 'category', 'currency'])->where('published', 1)->where('available', 1);


    if ($category_id) {
        $filtered_products = $filtered_products->where('category_id', $category_id);
    }
    if ($range) {
        $filtered_products = $filtered_products->where('price', '<', $range);
    }
    // Search options
    if ($search) {
        $reservedSymbols = ['-', '+', '<', '>', '@', '(', ')', '~'];
        $searchTerm = str_replace($reservedSymbols, ' ', $search);
        $searchValues = preg_split('/\s+/', $searchTerm, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($searchValues as $value) {
            $filtered_products = $filtered_products->orWhere('title', 'like', "%{$value}%")->orWhere('description', 'like', "%{$value}%");
        }
        $filtered_products = $filtered_products->orderBy('title');
//        $filtered_products = $filtered_products->orWhere('title', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%');
    }
    if ($dir === 'asc') {
        $filtered_products = $filtered_products->orderBy($order);
    } elseif ($dir === 'desc') {
        $filtered_products = $filtered_products->orderByDesc($order);
    }

//    dd($filtered_products->get());
    return $filtered_products->paginate($paginate);
}

function custom_filter_var($input, $type = FILTER_SANITIZE_STRING)
{
    return filter_var($input, trim(htmlspecialchars($type)));
}

function get_categories()
{
    return \Modules\Shop\Entities\Category::with(['category', 'sub_categories', 'image', 'products' => function ($product) {
        return $product->where('published', 1)->where('available', 1);
    }])->get();
}

function get_category_from_slug($slug)
{
    return \Modules\Shop\Entities\Category::where('slug', $slug)->first();
}

function get_user_currency()
{
    return \Illuminate\Support\Facades\Cache::get('user_currency');
}

function check_user_currency()
{
    return \Illuminate\Support\Facades\Cache::has('user_currency');
}

function set_user_currency($currency_id, $code)
{
    return \Illuminate\Support\Facades\Cache::put('user_currency', ['id' => $currency_id, 'code' => $code]);
}

function set_redirect_with_prev_session($to, $session_id, $name = 'redirect_to')
{
    Cache::put($name, $to);
    Cache::put('prev_session', $session_id);
}

function clear_redirect_for_prev_session()
{
    Cache::forget('redirect_to');
    Cache::forget('prev_session');
}

function get_cache_record($name)
{
    if (Cache::has($name)) {
        return Cache::get($name);
    }
    return null;
}

function set_amount($code, $amount)
{
    return Currency::convert()->from($code)->to(get_user_currency()['code'] ?? 'NGN')->amount($amount)->get();
}

function convert_to_user_currency($amount, $code)
{
    $user_currency = get_user_currency();
    if ($code !== $user_currency['code']) {
        $converted = set_amount($code, (float)$amount);
        return currency_with_price($converted, $user_currency['code']);
    }
    return currency_with_price((float)$amount, $code);
}
