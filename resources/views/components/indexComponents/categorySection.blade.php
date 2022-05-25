@props(['aC'])
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @foreach($aC as $c)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{$c->products->count()}} Products</p>
                    <a href="/shop?category={{$c->id}}&{{http_build_query(request()->except(['category','page']))}}" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="img/cat-{{rand(1,6)}}.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{$c->name}}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
