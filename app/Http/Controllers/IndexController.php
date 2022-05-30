<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $p=array_unique(Arr::flatten(Category::select('parent')->where('parent','!=',0)->get()->toArray()));
        $cat=Category::latest()->whereNotIn('id',$p)->simplePaginate(6);

        $p=Arr::sort(Product::all()->map(fn($i)=>$i->rates->pluck('amount')->avg()));

        $test=[];
       foreach ($p as $key => $value){
           array_push($test,["id" => $key+1, "avg" => $value]);
       }
       $bRPs=Product::whereIn('id',array_map(fn($i)=>$i['id'],array_slice(array_reverse($test),0,9)))->get('id');

        return view('index',[
            'allCategories' => $cat,
            'justArriveProducts' => Product::orderBy('id','DESC')->limit(8)->get(),
            'bestRatingProducts' => $bRPs,
            'ourFeatures' => DB::table('our_features')->get(),
        ]);
    }
}
