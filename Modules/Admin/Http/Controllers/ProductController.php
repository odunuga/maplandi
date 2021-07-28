<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Shop\Entities\Category;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Parameter;
use Modules\Shop\Entities\ParameterBuilder;
use Modules\Shop\Entities\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin_web')->except('showLogin');
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $cats = Category::with(['category', 'sub_categories'])->get();
        $total = Product::count();
        $products = Product::with(['category', 'currency', 'image', 'parameters'])->orderByDesc('id')->simplePaginate(20);

        return view('admin::item.index')->with(['categories' => $cats, 'total' => $total, 'products' => $products]);
    }


    public function builder($id)
    {
        $category = Category::with(['parameters', 'parameters.properties'])->firstOrFail();
        $parameters = $category->parameters;
        return view('admin::category_builder')->with(['category' => $category, 'parameters' => $parameters]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param mixed sku
     * @return Renderable
     */
    public function edit($sku)
    {
        if ($sku) {
            $check = Product::with(['image', 'images', 'currency', 'tags', 'category', 'parameters'])->where('sku', $sku);
            if ($check->count() > 0) {
                $product = $check->first();
                $currencies = Currency::all();
                $categories = Category::all();
                return view('admin::item.edit')->with(['product' => $product, 'currencies' => $currencies, 'categories' => $categories]);
            }
        }
        return back()->with(['error', 'Product Not Found']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
