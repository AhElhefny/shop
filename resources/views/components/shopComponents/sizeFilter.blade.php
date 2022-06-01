<div class="mb-5">
    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
    <form action="" method="get" id="sizeForm">
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-"  id="size-all" @if(request('size')==='all' || !request('size')) checked @endif name="size" value="all">
            <label style="margin-top: 10px; margin-left: -140px;" for="size-all">All Size</label>
            <span class="badge border font-weight-normal">{{$allatrr[0]->product->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-1" @if(request('size')==='S')checked @endif name="size" value="S">
            <label style="margin-top: 10px; margin-left: -170px;" for="size-1">S</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','S')->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-2" @if(request('size')==='M')checked @endif name="size" value="M">
            <label style="margin-top: 10px; margin-left: -170px;" for="size-2">M</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','M')->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-3" @if(request('size')==='L')checked @endif name="size" value="L">
            <label style="margin-top: 10px; margin-left: -170px;" for="size-3">L</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','L')->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-4" @if(request('size')==='XL')checked @endif name="size" value="XL">
            <label style="margin-top: 10px; margin-left: -170px;" for="size-4">XL</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','XL')->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-5" @if(request('size')==='XXL')checked @endif name="size" value="XXL">
            <label style="margin-top: 10px; margin-left: -170px;" for="size-5">XXL</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','XXL')->count()}}</span>
        </div>
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="radio" class="custom-control-" id="size-6"  @if(request('size')==='XXXL')checked @endif name="size" value="XXXL" >
            <label style="margin-top: 10px; margin-left: -170px;" for="size-6">XXXL</label>
            <span class="badge border font-weight-normal">{{$allatrr->where('size','XXXL')->count()}}</span>
        </div>
    </form>
</div>
<script>
    $(".custom-control-").click(function (){
        $("#sizeForm").submit();
    });
</script>
