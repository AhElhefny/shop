<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $date=['delete_at'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(){
        return $this->belongsToMany(Product::class,'favourites');
    }

    public function favrates(){
        return $this->hasMany(FavRate::class);
    }

    public function setImageAttribute($image){
        if(strpos($image,'public/')==0){
            $image=str_replace('public/','',$image);
        }
        $this->attributes['image']=$image;
    }

    public function carts(){
      return  $this->hasMany(UserCart::class);
    }
}
