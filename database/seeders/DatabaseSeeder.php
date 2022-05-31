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
    protected $category=['Dresses','Men\'s Dresses','Women\'s Dresses','Baby\'s Dresses','Shirts','Jeans','Swimwear','Sleepwear','Sportswear','Jumpsuits','Blazers','Jackets','Shoes'];
    protected $size=['S','M','L','XL','XXL','XXXL'];
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
        Rate::factory(50)->create();
        Color::factory(50)->create();

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

        for ($i=0 ; $i<100;$i++){
            DB::table('productcolor')->insert(array(
                array('product_id'=>rand(1,20),'color_id'=>rand(1,10))
            ));

            DB::table('productsize')->insert(array(
                array('product_id'=>rand(1,20),'size_id'=>rand(1,6))
            ));



        }

    }
}
