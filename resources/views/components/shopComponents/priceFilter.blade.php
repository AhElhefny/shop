<div class="border-bottom mb-4 pb-4">
    <h5 class="font-weight-semi-bold mb-4">Filter by price</h5>
    <form action="{{request()->fullUrlWithQuery(['price'=>request('price')])}}" method="get" id="priceForm">
{{--        <input type="hidden" name="{{request()->getQueryString()}}" value="11">--}}
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="all" ||!request('price'))checked @endif  id="price-all" name="price" value="all">
            <label style="margin-top: 10px; margin-left: -145px;" for="price-all">All Price</label>
            <span class="badge border font-weight-normal">{{$allpro->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="0,100")checked @endif id="price-1" name="price" value="0,100">
            <label style="margin-top: 10px; margin-left: -140px;" for="price-1">$0 - $100</label>
            <span class="badge border font-weight-normal">{{$allpro->where('price','<=',100)->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="100,200")checked @endif id="price-2" name="price" value="100,200">
            <label style="margin-top: 10px; margin-left: -115px;" for="price-2">$100 - $200</label>
            <span class="badge border font-weight-normal">{{$allpro->whereBetween('price',[100,200])->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="200,300")checked @endif id="price-3" name="price" value="200,300">
            <label style="margin-top: 10px; margin-left: -115px;" for="price-3">$200 - $300</label>
            <span class="badge border font-weight-normal">{{$allpro->whereBetween('price',[200,300])->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="300,400")checked @endif id="price-4" name="price" value="300,400">
            <label style="margin-top: 10px; margin-left: -115px;" for="price-4">$300 - $400</label>
            <span class="badge border font-weight-normal">{{$allpro->whereBetween('price',[300,400])->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="-control-input" @if(request('price')==="400,500")checked @endif id="price-5" name="price" value="400,500">
            <label style="margin-top: 10px; margin-left: -115px;" for="price-5">$400 - $500</label>
            <span class="badge border font-weight-normal">{{$allpro->whereBetween('price',[400,500])->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
            <input type="radio" class="-control-input" @if(request('price')==="moreThan 500")checked @endif id="price-5" name="price" value="moreThan 500">
            <label style="margin-top: 10px; margin-left: -115px;" for="price-5">$500 - More</label>
            <span class="badge border font-weight-normal">{{$allpro->where('price','>',500)->count()}}</span>
        </div>
    </form>
</div>

<script>
    $(".-control-input").click(function (){
        $("#priceForm").submit();
    });
</script>
