<x-masterPage>
    <!-- Page Header Start -->
    <x-layout.pageHeader name="Our Shop" />
    <!-- Page Header End -->
    <!-- Shop Start -->
    @if($allProducts->count())
    <div class="container-fluid pt-5">
        @if(request('season'))
            <center><h1>{{strtoupper(request('season').' collections')}}</h1></center>
        @endif
        <div class="row px-xl-5">

            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <x-shopComponents.priceFilter />
                <!-- Price End -->
                <!-- Color Start -->
                @if($colors->count()>0)
                <x-shopComponents.colorFilter :colors="$colors" />
                @endif
                <!-- Color End -->
                <!-- Size Start -->
                <x-shopComponents.sizeFilter :Sizes="$sizes" />
                <!-- Size End -->
            </div>

            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
{{--                @if(request('season'))--}}
{{--                    <center><h1>{{strtoupper(request('season').' collections')}}</h1></center>--}}
{{--                @endif--}}
                <div class="row pb-3">
                    <!-- sort by Start -->
                    <x-shopComponents.sortByFilter />
                    <!-- sort by  end -->
                    @foreach($allProducts as $p)
                        <x-layout.productCard :p="$p" class="col-lg-4" />
                    @endforeach
{{--                    <x-shopComponents.paginator />--}}
                    {!! $allProducts->links() !!}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
    @else
        <center><div class="text-center bg-warning text-xl" >
            <p class="text-muted"> no just Products yet to show</p>
        </div></center>
    @endif

</x-masterPage>
