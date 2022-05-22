<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $with=['category'];

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
}
