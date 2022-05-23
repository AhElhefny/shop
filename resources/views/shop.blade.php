<x-masterPage>
    <!-- Page Header Start -->
    <x-layout.pageHeader name="Our Shop" />
    <!-- Page Header End -->
    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <x-shopComponents.priceFilter />
                <!-- Price End -->
                <!-- Color Start -->
                <x-shopComponents.colorFilter />
                <!-- Color End -->
                <!-- Size Start -->
                <x-shopComponents.sizeFilter />
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    <!-- sort by Start -->
                    <x-shopComponents.sortByFilter />
                    <!-- sort by  end -->
                    <x-shopComponents.productSection :allProducts="$allProducts" />

{{--                    <x-shopComponents.paginator />--}}
                    {!! $allProducts->links() !!}
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

</x-masterPage>
