<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with=['category'];
    public function scopeFilter($query,array $filter){
        $query->when($filter['Latest']??false ,function ($query){
            $query->orderBy('id','DESC');
        })->when($filter['Popularity']?? false,function($query){
            $query->where('id',18);
        })->when($filter['BestRating']??false,function ($query){
            $query->where('id',8);
        })->when($filter['category']??false,function ($query,$category){
           $query->where('category_id',$category);
        })->when($filter['season']??false,function ($query,$season){
            $query->where('season',$season);
        });
    }

    public function category(){
       return $this->belongsTo(Category::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class,'productcolor');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class,'productsize');
    }

    public function rates(){
        return $this->belongsToMany(Rate::class,'productrate');
    }

    public function users(){
        return $this->belongsToMany(User::class,'favourites');
    }

    public function sumRate(){
        $sum=0;
        return array_sum($this->rates->map(function ($i)use ($sum){
             $sum +=$i->amount;
             return $sum/count($this->rates);
        })->toArray());

    }
}
