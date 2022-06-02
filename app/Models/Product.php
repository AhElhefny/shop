<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $date=['delete_at'];

    protected $with=['category'];
    public function scopeFilter($query,array $filter){
        $query->when($filter['Latest']??false ,function ($query){
            $query->orderBy('id','DESC');
//        })->when($filter['Popularity']?? false,function($query){
//            $query->whereHas('favrates',function ($query){
//                $query->where('favorite',1)->count()->max();
//            });
//        })->when($filter['BestRating']??false,function ($query){
//            $query->whereHas('favrates',function ($query){
//                $query->whereNotNull('amount')->sum('amount');
//            });
        })->when($filter['category']??false,function ($query,$category){
           $query->where('category_id',$category);
        })->when($filter['season']??false,function ($query,$season){
            $query->where('season',$season);
        })->when($filter['offer']??false,function ($query){
            $query->where('offers','>=',20);
        })->when($filter['price']?? false,function ($query,$price){
            if($price==="all"){
                $query->where('price','>',0);
            }
            elseif ($price==="moreThan 500"){
                $query->where('price','>',500);
            }
            else {
                $price = explode(',', $price);
                $query->whereBetween('price', [(int)$price[0], (int)$price[1]]);
            }
        })->when($filter['size']??false,function ($query,$size){
            if($size!=="all"){
                $query->whereHas('productattributes',fn($query)=>
                $query->where('size', $size)
                );
            }
        })->when($filter['color']??false,function ($query,$color){
            $query->whereHas('productattributes',function ($query)use($color) {
                  if ($color !== "all") {
                     $query->where('color', $color);
                }
            });
        })->when($filter['search']??false,function ($query,$search){
            $query->where(fn($query)=>
                $query->where('name','like', '%'.$search.'%')
                ->orWhere('season','like', '%'.$search.'%')
                ->orWhereHas('productattributes',function ($query)use($search){
                    $query->where('color',strtolower($search));
                }));
        })->when($filter['userFav']??false,function ($query,$user){
            $query->whereHas('favrates',fn($query)=>
               $query->where('user_id',$user)->where('favorite',1)
            );
        });
    }

    public function category(){
       return $this->belongsTo(Category::class);
    }

    public function productattributes(){
        return $this->hasMany(ProductAttributes::class);
    }

    public function favrates(){
        return $this->hasMany(FavRate::class);
    }

}
