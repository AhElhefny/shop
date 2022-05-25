<?php

namespace App\Http\Controllers;

use App\Mail\forUpdateMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(){
        $p=array_unique(Arr::flatten(Category::select('parent')->where('parent','!=',0)->get()->toArray()));
        $cat=Category::latest()->whereNotIn('id',$p)->simplePaginate(6);

        return view('index',[
            'allCategories' => $cat,
            'justArriveProducts' => Product::orderBy('id','DESC')->limit(8)->get(),
        ]);
    }
}
