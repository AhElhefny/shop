<div class="{{$class}} col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="img/product-{{rand(1,8)}}.jpg" alt="">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
            <h6 class="text-truncate mb-3">{{$p->name}}</h6>
            <div class="d-flex justify-content-center">
{{--                @dd(bcsub($p->price,((int)bcmul(intdiv($p->offers,100),$p->price))))--}}
                <h6>${{$p->price-(($p->offers/100)*$p->price)}}</h6><h6 class="text-muted ml-2">@if($p->offers)<del>${{$p->price}}</del>@endif</h6>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
            <a href="/product/detail/{{$p->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            @auth
                <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            @endauth
        </div>
    </div>
</div>

