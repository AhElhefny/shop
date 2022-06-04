<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <x-social-component />
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="/" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
        </div>
        @auth
        <div class="col-lg-3 col-6 text-right">
            <a href="/shop?userFav={{auth()->user()->id}}&.{{http_build_query(request()->except(['userFav','page']))}}" class="btn border">
                <i class="fas fa-heart {{($userFavCount->where('user_id',auth()->user()->id)->count() >0 )?'text-danger':'text-primary'}} " id="topbarfav"></i>
                <span class="badge" id="favCount">{{$userFavCount->where('user_id',auth()->user()->id)->count()}}</span>
            </a>
            <a href="/cart" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge" id="cartCount">{{$userCartCount->where('user_id',auth()->user()->id)->count()}}</span>
            </a>
        </div>
        @endauth
    </div>
</div>
