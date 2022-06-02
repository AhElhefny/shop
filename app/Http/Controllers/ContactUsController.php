<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Models\FavRate;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ContactUsController extends Controller
{
    public function contact(){
        $data = request()->validate([
            'name' => ['required','min:7','max:255'],
            'email' => ['required','min:7','max:255',Rule::unique('contact_us','email')],
            'subject' => ['required','min:7','max:255'],
            'message' => ['required','min:7'],
        ]);
        ContactUs::create($data);
        return back();
    }

    public function storeReview(){
        $data=request()->validate([
           'amount' => ['required','numeric'],
           'review' => ['required','min:7','max:255'],
           'product_id' => ['required','numeric',Rule::exists('products','id')],
           'user_id' => ['required','numeric',Rule::exists('users','id')]
        ]);
        $r=FavRate::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->first();
        if($r){
            DB::table('fav_rates')->where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->update([
                'amount' => $data['amount'],
                'review' => $data['review']
            ]);
        }else{
            FavRate::create($data);
        }

        $data['count']=FavRate::whereNotNull('amount')->where('product_id',$data['product_id'])->count();
        return response()->json($data);
    }
}
