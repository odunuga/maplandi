<?php

namespace Modules\Shop\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
            $hot_deals = Product::with(['category', 'image', 'tags', 'currency'])->inRandomOrder()->where('hot', 1)->where('published', 1)->where('available', 1)->take(12)->get();
        $product = new Product();
        $latest_products = $this->get_latest($product);
        $random_products = $this->get_random($product);
        $popular_products = $this->get_popular($product);
        return view('welcome', ['hot_deals' => $hot_deals, 'latest_products' => $latest_products, 'random_products' => $random_products, 'popular_products' => $popular_products]);

    }


    private function get_latest($product)
    {
        return $product->latest()->where('published', 1)->where('available', 1)->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);

    }

    private function get_random($product)
    {
        return $product->inRandomOrder()->where('published', 1)->where('available', 1)->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);
    }

    private function get_popular($product)
    {
        return $product->where('published', 1)->where('available', 1)->orderByViews()->get()->take($this->take)->load(['image', 'tags', 'category', 'currency']);
    }


    /**
     * Show the specified resource.
     * @param mixed $sku
     * @return Renderable
     */
    public function show($sku)
    {
        $product = $this->repo->findBySku($sku, ['image', 'category', 'tags', 'currency', 'parameters'])->first();
        return view('shop::show')->with(compact('product'));
    }

}
