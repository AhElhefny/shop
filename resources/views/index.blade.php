<x-masterPage>

    <!-- Featured Start -->
    <x-layout.Featured :ourFeatures="$ourFeatures"/>
    <!-- Featured End -->

    <!-- Categories Start -->
    <x-indexComponents.categorySection :aC="$allCategories" />
    {!! $allCategories->links() !!}
    <!-- Categories End -->

    <!-- Offer Start -->
    <x-indexComponents.offers />
    <!-- Offer End -->

    <!-- Best Rating Products Start -->
    <div class="container-fluid pt-5">
        <x-layout.productSectionHeader name="Best Rating Products" />
        <div class="row px-xl-5 pb-3">
            @foreach($bestRatingProducts as $p)
            <x-layout.productCard class="col-lg-3" :p="$p" />
            @endforeach
        </div>
    </div>
    <!-- Best Rating Products End -->

    <!-- 4Updates Start -->
    <x-indexComponents.forUpdate />
    <!-- 4Updates End -->

    <!-- justArrive Products Start -->
    <div class="container-fluid pt-5">
        <x-layout.productSectionHeader name="Just Arrived"  />
        <div class="row px-xl-5 pb-3">
            @foreach($justArriveProducts as $p)
            <x-layout.productCard class="col-lg-3" :p="$p" />
            @endforeach
        </div>
    </div>
    <!-- justArrive Products End -->

</x-masterPage>
