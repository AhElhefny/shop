<div class="d-flex mb-4">
    <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
    @if(!$color)
        <div class="custom-control custom-radio custom-control-inline">
            <p class="text-muted">We are sorry for that, but no colors available now</p>
        </div>
    @endif
    <form>
        @foreach($color as $c)
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="{{$c->name}}" name="color">
                <label class="custom-control-label" for="{{$c->name}}">{{$c->name}}</label>
            </div>
        @endforeach
    </form>
</div>
