<?php

namespace App\Http\Controllers;

use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserCartController extends Controller
{
    //


    public function addToCart(){
        $data=\request()->validate([
            'product_id' => ['required','numeric',Rule::exists('products','id')],
            'user_id' => ['required','numeric',Rule::exists('users','id')],
        ]);
        UserCart::create($data);
        $count=UserCart::where('user_id',$data['user_id'])->count();
        return response()->json($count);
    }

    public function getColors(){
        $Carts=UserCart::where('user_id',\request('user_id'))->where('product_id',\request('product_id'))->get();
        $colors=$Carts->map(fn ($c)=> $c->product->productattributes->where('size', \request('size')));
//        dd($colors->color);
        return response()->json($colors);
    }

    public function destroy(){
        $data=\request()->validate([
           'product_id' => ['required',"numeric",Rule::exists('products','id')],
           'user_id' => ['required',"numeric",Rule::exists('users','id')],
        ]);
        UserCart::where('user_id',$data['user_id'])->where('product_id',$data['product_id'])->delete();

       $count= UserCart::where('user_id',$data['user_id'])->count();
       $subTotal=UserCart::where('user_id',$data['user_id'])->get();
       $attr=[
            'count' => $count,
            'subTotal' => array_sum($subTotal->map(fn ($item)=>$item->product->price)->toArray()),
        ];
        return response()->json($attr);
    }
}
