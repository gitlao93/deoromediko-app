<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::create(
            [
                'generic_name' => 'Filgrastim',
                'brand_name' => 'Macroleuco',
                'product_form' => '300mcg, vial box of 10',
                'market_price' => 2100.00
            ]
        );

        Product::create(
            [
                'generic_name' => 'Filgrastim',
                'brand_name' => 'Filgra',
                'product_form' => '300mcg, Pre-filled Syringe box of 2',
                'market_price' => 1500.00
            ]
        );

        Product::create(
            [
                'generic_name' => 'Doxorubicin',
                'brand_name' => 'Doxoruba',
                'product_form' => '25mg/ml solution',
                'market_price' => 1500.00
            ]
        );
    }
}
