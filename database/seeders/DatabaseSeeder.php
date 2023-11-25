<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user = User::create([
            'name' => 'Administator',
            'position' => 'owner',
            'email' => 'admin@test.com',
            'password' => Hash::make(12345678),
        ]);

        $category = Category::create([
            'category_code' => 'CA_01',
            'category_name' => 'Minuman'
        ]);

        $product = Product::create([
            'category_id' => 1,
            'product_code' => 'teh-01',
            'product_name' => 'Teh Pucuk',
            'price' => 5000,
            'qty' => 25,
            'alert_qty' => 5,
            'note' => 'Teh enak'
        ]);

        $supplier = Supplier::create([
            'supplier_name' => 'Jarjit',
            'supplier_email' => 'jarjit@gmail.com',
            'supplier_phone' => '08571234567',
            'address' => 'Jakarta'
        ]);
    }
}
