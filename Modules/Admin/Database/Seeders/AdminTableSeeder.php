<?php

namespace Modules\Admin\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Testimony;
use Modules\Admin\Entities\WhyChooseUs;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Testimony::count() < 0) {
            Testimony::factory()->count(10)->for(User::factory()->count(5))->create();
        }
        if (WhyChooseUs::count() < 1) {
            $lists = [
                [
                    'title' => 'Trustworthy',
                    'description' => 'You can place your orders with a soothing relief and be rest assured to get the best from us.',
                    'icon' => 'lni lni-book'
                ],
                [
                    'title' => 'Affordable',
                    'description' => 'We give the best prices better than anyone else',
                    'icon' => 'lni lni-money-protection'
                ],
                [
                    'title' => 'Efficient',
                    'description' => 'All our processes are well organized from account creation to order processing expect the best no less.',
                    'icon' => 'lni lni-cog'
                ],
                [
                    'title' => 'Quality',
                    'description' => 'Our products are so quality that you can make your order with your eyes closed and still get the best',
                    'icon' => 'lni lni-pointer-up'
                ],
                [
                    'title' => 'Support',
                    'description' => 'Our support teams are availaible 24/7 to attend to all your queries',
                    'icon' => 'lni lni-layout'
                ],
                [
                    'title' => 'Nationwide Delivery',
                    'description' => 'We deliver to all states in Nigeria',
                    'icon' => 'lni lni-delivery'
                ]
            ];
            foreach ($lists as $item) {
                WhyChooseUs::firstOrCreate([
                    'title' => $item['title'],
                    'description' => $item['description'],
                    'icon' => $item['icon']
                ]);

            }
        }
    }
}
