<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Modules\Admin\Entities\TestimonyRequest;
use Modules\Shop\Entities\Product;
use Modules\Shop\Repository\ShopInterface as Repo;

class ShopController extends Controller
{
    private $repo;
    public $take = 9;

    public function __construct(Repo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('shop::index');
    }


    public function welcome()
    {
        $hot_deals = [];
        if (Product::count() > 0)
            $hot_deals = Product::with(['category', 'image', 'tags', 'currency'])->inRandomOrder()->where('hot', 1)->where('stock', '>', 0)->where('published', 1)->where('available', 1)->take(12)->get();
        $product = new Product();
        $latest_products = $this->get_latest($product);
        $random_products = $this->get_random($product);
        $popular_products = $this->get_popular($product);
        return view('welcome', ['hot_deals' => $hot_deals, 'latest_products' => $latest_products, 'random_products' => $random_products, 'popular_products' => $popular_products]);

    }


    private function get_latest($product)
    {
        return $product->latest()->where('stock', '>', 0)->where('published', 1)->where('available', 1)->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);

    }

    private function get_random($product)
    {
        return $product->inRandomOrder()->where('stock', '>', 0)->where('published', 1)->where('available', 1)->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);
    }

    private function get_popular($product)
    {
        return $product->where('stock', '>', 0)->where('published', 1)->where('available', 1)->orderByViews()->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);
    }

    /**
     * Show the specified resource.
     * @param mixed $sku
     * @return Renderable
     */
    public function show($sku)
    {
        $product_check = $this->repo->findBySku($sku);
        if ($product_check->count() > 0) {
            $product = $product_check->first();
            views($product)->unique()->record();
            return view('shop::show')->with(compact('product'));
        }
        session()->flash('error', __('texts.product_not_found'));
        return back();
    }

    public function testimony_request($token)
    {
        if (auth()->check()) {
            $user_check = TestimonyRequest::where('token', $token);
            if ($user_check->count() > 0) {
                $user = $user_check->first();
                return view('testimony.testify')->with(['id' => $user->id, 'token' => $token]);
            }
            session()->flash('error', 'Token Not Found');

            return redirect();
        }
        Cache::put('redirect_to', url('testimony/request/' . $token));
        return redirect()->route('login');
    }

}
