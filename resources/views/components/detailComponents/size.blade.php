@props(['size'])
<div class="d-flex mb-3">
    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
    <form>

        @foreach($size as $s)
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="{{$s->size}}" name="size">
                <label class="custom-control-label" for="{{$s->size}}">{{$s->size}}</label>
                </div>
        @endforeach

    </form>
</div>
