
<div class="d-flex mb-3">
    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
    @if(!$size)
        <div class="custom-control custom-radio custom-control-inline">
            <p class="text-muted">We are sorry for that, but no sizes  available now</p>
        </div>
    @endif
    <form>

        @foreach($size as $s)
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="{{$s->size}}" name="size">
                    <label class="custom-control-label" for="{{$s->size}}">{{$s->size}}</label>
                </div>

        @endforeach

    </form>
</div>
