<?php

namespace Database\Seeders;

use App\Models\Cart;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',

        ]);


        Category::factory(10)->create(); // 10 kategori oluştur
        Product::factory(50)->create(); // 50 ürün oluştur




        // Belirli bir ürün için örnek yorumlar ekleyelim
        $products = Product::all();

        foreach ($products as $product) {
            for ($i = 0; $i < 3; $i++) {
                Comment::create([
                    'product_id' => $product->id,
                    'user_id' => User::inRandomOrder()->first()->id, // Rastgele bir kullanıcı seç
                    'content' => 'Bu bir örnek yorum içeridir.'. $this->faker->unique()->word,
                ]);
            }
        }

    }
}
