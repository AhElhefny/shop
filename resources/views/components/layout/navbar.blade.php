<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <x-category-drop-down-component />
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="/" class="nav-item nav-link">Home</a>
                        <a href="/shop" class="nav-item nav-link">Shop</a>
                        @auth
                        <a href="/cart" class="nav-item nav-link">Shopping Cart</a>
                        @endauth
                        <a href="/contact" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @guest
                        <ul class="nav navbar-nav navbar-right">
                            <li data-toggle="modal" data-target="#mydaftar"><a href="#" class="nav-item nav-link"><span class="fas fa-sign-in-alt"></span> Register</a></li>
                            <li data-toggle="modal" data-target="#mylogin"><a href="#" class="nav-item nav-link"><span class="fa fa-home"></span> Login</a></li>
                        </ul>
                        @endguest
                        @auth
                            <div class="dropdown">
                                <button class="dropbtn"><i class="fa fa-user"></i></button>
                                <div class="dropdown-content">
                                    <a class="text-xs font-bold uppercase" href="#">Welcome {{auth()->user()->name}}</a>
                                    <a class="text-xs font-bold uppercase"><Form action="{{url('/logout')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>  LOG OUT</button>
                                    </Form></a>
                                </div>
                            </div>
                        @endauth


                    </div>

                </div>
            </nav>
            @if(request()->route()->named('home'))
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('img/carousel-1.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="/shop" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="{{asset('img/carousel-2.jpg')}}" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="/shop" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
