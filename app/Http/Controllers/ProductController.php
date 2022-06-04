<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\FavRate;
use App\Models\Product;
use App\Models\ProductAttributes;
use App\Models\Size;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $all=Product::filter(request([
            'Latest','Popularity','BestRating',
            'category','season','offer','price',
            'size','color','search','userFav'
        ]))
            ->simplePaginate(9)
            ->withQueryString();
        $products=Product::all();

        return view('shop',[
            'allProducts' => $all,
            'allAtrr' =>ProductAttributes::latest()->simplePaginate(5),
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('detail',[
            'product'=>$product,
            'productRate' => $product->favrates()->whereNotNull('amount')->simplePaginate(4)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeFav(){
        $data = request()->validate([
            'product_id' =>['required','numeric',Rule::exists('products','id')],
            'user_id' =>['required','numeric',Rule::exists('users','id')],
            'favorite' =>['boolean']
        ]);
        $f=FavRate::where('user_id',auth()->user()->id)->where('product_id',$data['product_id'])->first();
        if($f){
            $data['favorite']=!$f->favorite;
            DB::table('fav_rates')->where('product_id',$data['product_id'])
                ->where('user_id',$data['user_id'])
                ->update(['favorite'=>$data['favorite']]);
        }else{
            $data['favorite']=1;
            FavRate::create($data);
        }
        if(\request()->ajax()){
            $favCount=FavRate::where('user_id',auth()->user()->id)->where('favorite',1)->count();
            return response()->json($favCount);
        }
        return view('');
    }


}
