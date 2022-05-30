@props(['colors'])
<div class="border-bottom mb-4 pb-4">
    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
    <form id="colorForm">
        @csrf
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" class="custom-control-input" checked id="color-all">
            <label class="custom-control-label" for="price-all">All Color</label>
            <span class="badge border font-weight-normal">1000</span>
        </div>
        @foreach($colors as $c)
        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
            <input type="checkbox" name="{{$c->name}}" class="custom-control-input" id="{{$c->name}}">
            <label class="custom-control-label" for="{{$c->name}}">{{strtoupper($c->name)}}</label>
            <span class="badge border font-weight-normal">{{$c->products->count()}}</span>
        </div>
        @endforeach
    </form>
</div>
