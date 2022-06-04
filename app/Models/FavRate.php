<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class FavRate extends Model
{
    use HasFactory;
    protected $guarded=[''];
    protected $date=['delete_at'];
//    protected $primaryKey=['product_id','user_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
