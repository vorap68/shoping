<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
/**
 *  Create models Category and Product
 */
        Category::factory(5)
            ->has(Product::factory(10))
            ->create();

/**
 * Create model Order and fill in pivot table order_product
 */

        for ($i = 1; $i < 7; $i++) {
            $product = Product::inRandomOrder()->first();
            Order::factory()->state([
                'sum'=> $product->price,
            ])
                ->create()
                ->each(function ($order) use ($product) {
                    $order->products()->attach($product->id, [
                        'count' => rand(1, 3),
                        'price' => $product->price,
                        'category_id' => $product->category->id,
                        'code' => 'UAH',
                    ]);
                });
        }
    }
}
