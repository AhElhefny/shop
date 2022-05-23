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
                        <a href="/detail" class="nav-item nav-link">Shop Detail</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="/cart" class="dropdown-item">Shopping Cart</a>
                                <a href="/checkout" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
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
        </div>
    </div>
</div>
