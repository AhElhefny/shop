<div class="border-bottom mb-4 pb-4">
    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
    <form id="colorForm" method="get" action="">
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" name="color" class="zozo custom-control-input" @if(request('color')==='all' || !request('color')) checked @endif  value="all"  id="color-all">
            <label class="custom-control-label" for="color-all">All Color</label>
            <span class="badge border font-weight-normal">{{$atrr[0]->product->count()}}</span>
        </div>
        @foreach($atrr as $c)
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" name="color" class="zozo custom-control-input" @if(request('color')===$c->color) checked @endif id="{{$c->color}}" value="{{$c->color}}">
            <label class="custom-control-label" for="{{$c->color}}">{{strtoupper($c->color)}}</label>
            <span class="badge border font-weight-normal">{{$atrr->where('color',$c->color)->count()}}</span>{{----}}
        </div>
        @endforeach
        {!! $atrr->links() !!}
    </form>
</div>
<script>
    $(".zozo").click(function (){
        $("#colorForm").submit();
    })
</script>
