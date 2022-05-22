<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $category=['Dresses','Men\'s Dresses','Women\'s Dresses','Baby\'s Dresses','Shirts','Jeans','Swimwear','Sleepwear','Sportswear','Jumpsuits','Blazers','Jackets','Shoes'];
    protected $size=['s','m','l','xl','2xl','3xl'];
    public function run()
    {
        Category::truncate();
        User::truncate();
        Product::truncate();
        Color::truncate();
        Rate::truncate();
        Size::truncate();

        User::factory(10)->create();
        Product::factory(20)->create();
        Rate::factory(5)->create();
        Color::factory(10)->create();

        // category factory
        foreach ($this->category as $key=>$cat) {
            Category::factory()->create([
                'name' => $this->category[$key],
            ]);
        }
        // size factory
        foreach ($this->size as $key=>$s) {
            Size::factory()->create([
                'size' => $this->size[$key],
            ]);
        }

    }
}
