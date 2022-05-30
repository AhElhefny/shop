<x-masterPage>
    <!-- Page Header Start -->
    <x-layout.pageHeader name="Contact Us" />
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
        </div>
        <div class="row px-xl-5">
            <x-contactComponents.contactForm />
            <x-contactComponents.ourAddress />
        </div>
    </div>
    <!-- Contact End -->
</x-masterPage>
