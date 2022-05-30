{{--@props(['ourFeatures'])--}}
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @forelse($ourFeatures as $f)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="{{$f->icon}} text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">{{$f->feature}}</h5>
            </div>
        </div>
        @empty
            <div class="col-lg-12 col-md-12 col-sm-12 pb-1">
                <p>There Is No Features Yet.</p>
            </div>
        @endforelse
    </div>
</div>
