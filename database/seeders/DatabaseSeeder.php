<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $size=['S','M','L','XL','XXL','XXXL'];
    protected $category=['Dresses','Men\'s Dresses','Women\'s Dresses','Baby\'s Dresses','Shirts','Jeans','Swimwear','Sleepwear','Sportswear','Jumpsuits','Blazers','Jackets','Shoes'];
    public function run()
    {
        Category::truncate();
        User::truncate();
        Product::truncate();
        Rate::truncate();

        User::factory(10)->create();
        Product::factory(20)->create();
        Rate::factory(50)->create();

        // category factory
        foreach ($this->category as $key=>$cat) {
            Category::factory()->create([
                'name' => $this->category[$key],
            ]);
        }

    }
}
