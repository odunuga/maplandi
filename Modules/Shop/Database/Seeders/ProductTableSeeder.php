<?php

namespace Modules\Shop\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Shop\Entities\Category;
use Modules\Shop\Entities\Comment;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Image;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\Tag;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (Currency::count() < 1) {
            $currencies = [
                [
                    'name' => 'Naira',
                    'code' => 'NGN',
                    'symbol' => '₦',
                ], [
                    'name' => 'United States Dollar',
                    'code' => 'USD',
                    'symbol' => '$',
                ], [
                    'name' => 'United Kingdom Pound',
                    'code' => 'GBP',
                    'symbol' => '£',
                ], [
                    'name' => 'Ghana Cedi',
                    'code' => 'GHS',
                    'symbol' => '¢',
                ],
            ];

            foreach ($currencies as $item) {
                Currency::create([
                    'name' => $item['name'],
                    'code' => $item['code'],
                    'symbol' => $item['symbol'],
                ]);
            }
        }
        if (Category::count() < 1) {
            $categories = [
                ['title' => 'Automobile', 'image' => 'vendor/images/categories/car.svg'],
                ['title' => 'Electronics', 'image' => 'vendor/images/categories/laptop.svg'],
                ['title' => 'Computing', 'image' => 'vendor/images/categories/laptop.svg'],
                ['title' => 'Furniture', 'image' => 'vendor/images/categories/furniture.svg'],
                ['title' => 'Phones', 'image' => 'vendor/images/categories/phone.svg'],
                ['title' => 'Materials', 'image' => 'vendor/images/categories/fashion.svg'],
                ['title' => 'Laptops', 'image' => 'vendor/images/categories/laptop.svg'],
                ['title' => 'Health & Beauty', 'image' => 'vendor/images/categories/hospital.svg'],
                ['title' => 'Cloths', 'image' => 'vendor/images/categories/tshirt.svg'],
                ['title' => 'Education', 'image' => 'vendor/images/categories/education.svg'],
                ['title' => 'Gadgets', 'image' => 'vendor/images/categories/controller.svg'],
                ['title' => 'Luggage and Backpacks', 'image' => 'vendor/images/categories/travel.svg'],
                ['title' => 'Watches', 'image' => 'vendor/images/categories/watch.svg'],
                ['title' => 'Events', 'image' => 'vendor/images/categories/matrimony.svg'],
            ];
            foreach ($categories as $item) {
                $cat = Category::create([
                    'title' => $item['title'],
                    'slug' => Str::slug($item['title']),
                    'tooltip' => 'Information about ' . $item['title']
                ]);
                $img = new Image();
                $img->url = $item['image'];
                $cat->image()->save($img);
            }
        }
        if (Category::count() > 1 && Product::count() < 1) {
            $tags = ['Bike', 'Services', 'Brand', 'Popular'];
            foreach ($x = Category::all() as $cat)
                Product::factory()->count(3)->create(['category_id' => $cat->id])->each(function ($product) use ($tags) {
                    Comment::factory()->for(User::factory(), 'comment_by')->count(3)->create(['product_id' => $product]);
                    foreach ($tags as $tag) {
                        $set = new Tag();
                        $set->title = $tag;
                        $product->tags()->save($set);
                    }
                });

        }

    }
}
