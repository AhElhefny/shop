<x-masterPage>

    <!-- Featured Start -->
    <x-layout.Featured />
    <!-- Featured End -->

    <!-- Categories Start -->
    <x-indexComponents.categorySection :aC="$allCategories" />
    {!! $allCategories->links() !!}
    <!-- Categories End -->

    <!-- Offer Start -->
    <x-indexComponents.offers />
    <!-- Offer End -->

    <!-- Best Rating Products Start -->
    <x-indexComponents.bestRating :bR="$bestRatingProducts" />
    <!-- Best Rating Products End -->

    <!-- 4Updates Start -->
    <x-indexComponents.forUpdate />
    <!-- 4Updates End -->

    <!-- justArrive Products Start -->
    <x-indexComponents.justArrive :jA="$justArriveProducts" />
    <!-- justArrive Products End -->

</x-masterPage>
