<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::insert([
            ['title' => 'homme'],
            ['title' => 'femme'],
        ]);

        factory(App\Product::class, 40)->create()->each(function($product){
          $names = ['homme', 'femme'];

          $category = App\Category::where('title', $names[rand(0, 1)])->first();

          $product->category()->associate($category);

          $product->save();
        });
    }
}
