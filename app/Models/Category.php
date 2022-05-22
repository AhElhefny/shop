<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hasChild="false";

    public function products(){
      return  $this->hasMany(Product::class);
    }

    public function is_parent($catList)
    {
        for($i =0 ; $i < $catList->count() ; $i++){
            if($this->id === $catList[$i]->parent){
                $this->hasChild="true";
            }
        }
        return $this->hasChild;
    }
}
