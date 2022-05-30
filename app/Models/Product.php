<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $date=['delete_at'];

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
        })->when($filter['offer']??false,function ($query){
            $query->where('offers','>=',20);
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
        return $this->hasMany(Rate::class);
    }

}
