<?php

namespace App\Providers;

use App\Models\FavRate;

use App\Models\UserCart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $userFavCount = FavRate::where('favorite', 1)->get();
        View::share('userFavCount', $userFavCount);
        $userCartCount=UserCart::all();
        View::share('userCartCount',$userCartCount);
        FavRate::whereNull('review')->whereNull('amount')->where('favorite',0)->delete();
    }


}
