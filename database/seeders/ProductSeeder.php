<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 100; $i++) {
            Product::create([
                'category_id' => 1,
                'sub_id' => 1,
                'provider_id' => 1,
                'name' => "Phụ tùng tham khảo {$i}",
                'code' => Str::random(20),
                'year' => 2020,
                'good_price' => 200000,
                'bad_price' => 100000
            ]);
        }
    }
}
