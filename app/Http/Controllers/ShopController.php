<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        $all=Product::filter(request(['Latest','Popularity','BestRating','category','season','offer']))->simplePaginate(9)->withQueryString();

        return view('shop',[
            'colors' => Color::all(),
            'sizes' => Size::all(),
            'allProducts' => $all,
        ]);
    }
}
