<div class="col-md-6">
    <h4 class="mb-4"><span id="reviewCount">{{$product->rates->count()}}</span> review for "{{$product->name}}"</h4>
    <div id="reviewCard">
    @foreach($product->rates as $UR)
        <div class="media mb-4" >
           <img src="{{asset('img/vendor-'. rand(1,8) .'.jpg')}}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">  {{--  TODO--}}
            <div class="media-body">
                <h6>{{$UR->user->name}}<small> - <i>{{$UR->created_at->format('d M Y')}}</i></small></h6>
                <div class="text-primary mb-2">
                    <x-detailcomponents.rates :avg="$UR->amount"/>
                </div>
                <p>{{$UR->review}}.</p>
            </div>
        </div>
    @endforeach
    </div>
</div>

