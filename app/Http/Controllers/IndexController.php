<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;

class IndexController extends Controller
{
    public function index(){
        $p=array_unique(Arr::flatten(Category::select('parent')->where('parent','!=',0)->get()->toArray()));
        $cat=Category::latest()->whereNotIn('id',$p)->simplePaginate(6);

        $p=Arr::sort(Product::all()->map(fn($i)=>$i->sumRate())->toArray());
        $test=[];
       foreach ($p as $key => $value){
           array_push($test,["id" => $key, "avg" => $value]);
       }
       $bRPs=Product::whereIn('id',array_map(fn($i)=>$i['id'],array_slice(array_reverse($test),0,9)))->get();


        return view('index',[
            'allCategories' => $cat,
            'justArriveProducts' => Product::orderBy('id','DESC')->limit(8)->get(),
            'bestRatingProducts' => $bRPs,
        ]);
    }
}
