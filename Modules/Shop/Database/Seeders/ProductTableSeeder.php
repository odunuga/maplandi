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
use Modules\Shop\Entities\Parameter;
use Modules\Shop\Entities\ParameterBuilder;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductParameter;
use Modules\Shop\Entities\Tag;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
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
                    'name' => 'South African Rand',
                    'code' => 'ZAR',
                    'symbol' => 'R',
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
                if ($item['title'] == 'Electronics') {
                    $prop = new ParameterBuilder();
                    $prop->type_name = 'Type';
                    $prop->type_id = 'productType';
                    $prop->type = 'select';
                    $prop->attributes = ['audio & Music Accessories', 'Games Consoles Accessories', 'Headphones Accessories', 'Networking Product Accessories', 'Photo & Video Accessories'];


                    $prop1 = new ParameterBuilder();
                    $prop1->type_name = 'Condition';
                    $prop1->type_id = 'productCondition';
                    $prop1->type = 'select';
                    $prop1->attributes = ['Brand New', 'Used'];
                    $para = Parameter::create([
                        'category_id' => $cat->id,
                        'title' => 'Type'
                    ]);
                    $para->properties()->save($prop);
                    $para->properties()->save($prop1);
                }
            }
        }
        if (Category::count() > 1 && Product::count() < 1) {
            $tags = ['Bike', 'Services', 'Brand', 'Popular'];
            $images = [
                '/vendor/images/items-tab/item-1.jpg',
                '/vendor/images/items-tab/item-2.jpg',
                '/vendor/images/items-tab/item-3.jpg',
                '/vendor/images/items-tab/item-4.jpg',
                '/vendor/images/items-tab/item-5.jpg',
                '/vendor/images/items-tab/item-6.jpg',
                '/vendor/images/items-tab/item-7.jpg',
                '/vendor/images/items-tab/item-8.jpg',
                '/vendor/images/items-grid/author-1.jpg',
                '/vendor/images/items-grid/author-2.jpg',
                '/vendor/images/items-grid/author-3.jpg',
                '/vendor/images/items-grid/author-4.jpg',
                '/vendor/images/items-grid/author-5.jpg',
                '/vendor/images/items-grid/author-6.jpg',
                '/vendor/images/items-grid/img1.jpg',
                '/vendor/images/items-grid/img2.jpg',
                '/vendor/images/items-grid/img3.jpg',
                '/vendor/images/items-grid/img4.jpg',
                '/vendor/images/items-grid/img5.jpg',
                '/vendor/images/items-grid/img6.jpg',
                '/vendor/images/item-details/image1.jpg',
                '/vendor/images/item-details/image2.jpg',
                '/vendor/images/item-details/image3.jpg',
                '/vendor/images/item-details/image4.jpg',
                '/vendor/images/item-details/image5.jpg',
            ];
            foreach ($x = Category::with(['parameters', 'parameters.properties'])->get() as $cat)
                Product::factory()->count(5)->create(['category_id' => $cat->id])->each(function ($product) use ($tags, $images, $cat) {
                    // Set single image for product
                    $ni = new Image();
                    $ni->url = $images[random_int(0, count($images) - 1)];
                    $product->image()->save($ni);
                    // set other images for product
                    $set_images = array_rand($images, 3);
                    foreach ($set_images as $img) {
                        $nim = new Image();
                        $nim->url = $img;
                        $product->images()->save($nim);
                    }

                    // add demo comments for product
                    Comment::factory()->for(User::factory(), 'comment_by')->count(3)->create(['product_id' => $product]);
                    // set tags for products
                    foreach ($tags as $tag) {
                        $set = new Tag();
                        $set->title = $tag;
                        $product->tags()->save($set);
                    }
                    $pv1 = ["audio & Music Accessories", "Games Consoles Accessories", "Headphones Accessories", "Networking Product Accessories", "Photo & Video Accessories"];
                    $pv2 = ["Brand New", "Used"];
                    // Set Parameters for product
                    if ($cat->parameters) {
                        foreach ($cat->parameters as $pa) {
                            $pp = new ProductParameter();
                            $pp->product_id = $product->id;
                            $pp->parameter_id = $pa->id;
                            $pp->value = $pa->id === 1 ? $pv1[random_int(0, count($pv1) - 1)] : $pv2[random_int(0, count($pv2) - 1)];
                            $pp->stock = random_int(1, 100);
                            $pp->save();
                        }

                    }
                });

        }

    }
}
