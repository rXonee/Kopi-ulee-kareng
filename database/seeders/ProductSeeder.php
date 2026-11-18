<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Kopi Ulee Kareng Original',
                'description' => 'Kopi khas Aceh dengan aroma kuat dan cita rasa legendaris.',
                'price' => 25000,
                'image' => 'kopi-default.jpg',
                'stock' => 7
            ],
            [
                'product_name' => 'Kopi Sanger',
                'description' => 'Perpaduan kopi hitam Aceh dan susu kental manis yang lembut.',
                'price' => 18000,
                'image' => 'kopi-default.jpg',
                'stock' => 9
            ],
            [
                'product_name' => 'Kopi Tubruk Aceh',
                'description' => 'Sajian kopi tubruk tradisional dengan bubuk kopi murni pekat.',
                'price' => 15000,
                'image' => 'kopi-default.jpg',
                'stock' => 20
            ],
        ];

        foreach ($products as $product) {
            Product::query()->updateOrCreate(
                ['product_name' => $product['product_name']],
                $product
            );
        }
    }
}
