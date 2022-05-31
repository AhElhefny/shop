<x-masterPage>
    <!-- Page Header Start -->
    <x-layout.pageHeader name="Shop Detail" />
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{asset('img/product-1.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/product-2.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/product-3.jpg')}}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="{{asset('img/product-4.jpg')}}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$product->name}}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <x-detailComponents.rates :avg="$product->rates->pluck('amount')->avg()" />
                    </div>
                    <small class="pt-1">(<span id="reviewCount1">{{$product->rates->count()}}</span> Reviews)</small>
                </div>

                <h3 class="font-weight-semi-bold mb-4">${{$product->price}}</h3>
                <p class="mb-4">{{$product->description}}.</p>

                <x-detailComponents.size :size="$product->sizes->unique()" />

                <x-detailComponents.color :color="$product->colors->unique()" />
                @auth
                    <x-detailComponents.addToCart />  {{-- TODO --}}
                @endauth

                <x-detailComponents.shareSection />
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
{{--                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a>--}}
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (<span id="reviewCount2">{{$product->rates->count()}}</span>)</a>
                </div>
                <div class="tab-content">
                    <x-detailComponents.productDesc :desc="$product->description" />

{{--                    <x-detailComponents.moreInfo  />--}}

                    <x-detailComponents.reviewPanel :product="$product" :productRate="$productRate" />
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel  related-carousel">
                    @foreach($product->category->products as $p)
                        @php
                        if($p->id===$product->id)break;
                        @endphp
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-{{rand(1,8)}}.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{$p->name}}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>${{($p->price-(($p->offers/100)*$p->price))}}</h6><h6 class="text-muted ml-2">@if($p->offers)<del>${{$p->price}}</del>@endif</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/product/detail/{{$p->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    </x-masterPage>
